<?php

namespace Dexter\Router;

/**
 * Rota padrão sistema para carregamento dos controladores
 */
class DefaultFrontRoute extends Route
{

    /**
     * Padrão da rota default
     */
    const PATTERN           = '@^/(?:(.+)\.html)?$@';

    /**
     * Controller padrão
     */
    const INDEX_CONTROLLER  = 'IndexController';

    /**
     * Action padrão
     */
    const INDEX_ACTION      = 'actionIndex';

    /**
     * Objeto para carregar View
     * @var Dexter\View\View
     */
    private $view;


    /**
     * Constrói rota
     */
    public function __construct()
    {
        parent::__construct(self::PATTERN, array($this, 'createController'));
    }

    /**
     * Rota padrão
     */
    protected function createController(RequestInterface $request, ResponseInterface $response)
    {

        // transforma parâmetros da URL no nome do controller
        $module = $this->getModule();
        $controller = $this->getController();
        $action = $this->getAction();
        $class = "\\DexterApp\\{$module}\\Controllers\\{$controller}";
        $viewFile = $this->getViewFile();

        // executa controller
        $this->create($class)->{$action}($request, $this->getView());

        // renderiza view
        $this->getView()->render($viewFile, $response, $this->getHeader(), $this->getFooter());
    }

    /**
     * Recupera o nome do módulo
     */
    private function getModule()
    {
        return $this->camelCase('front');
    }

    /**
     * Recupera o nome do controller
     */
    private function getController()
    {
        if (isset($this->argsUrl[0])) {
            return $this->camelCase($this->argsUrl[0]) . 'Controller';
        }
        return self::INDEX_CONTROLLER;
    }

    /**
     * Recupera o nome da action
     */
    private function getAction()
    {
        return self::INDEX_ACTION;
    }

    /**
     * Recupera o nome da view daquele controller
     */
    private function getViewFile()
    {
        $controller = isset($this->argsUrl[0]) ? $this->argsUrl[0] : 'index';
        return __DIR__ . "/../../../application/Front/Views/{$controller}.php";
    }

    /**
     * Topo das views
     */
    private function getHeader()
    {
        return __DIR__ . '/../../../application/Front/Views/topo.php';
    }

    /**
     * Rodapé das views
     */
    private function getFooter()
    {
        return __DIR__ . '/../../../application/Front/Views/rodape.php';
    }

    /**
     * Transforma uma string para CamelCase
     */
    private function camelCase($string)
    {
        $string = str_replace('_', ' ', $string);
        $string = ucwords($string);
        return str_replace(' ', '', $string);
    }

    /**
     * Recupera a view
     */
    public function getView()
    {
        if (!$this->view) {
            $this->view = new \Dexter\View\View(new \Dexter\View\Container());
        }
        return $this->view;
    }

    /**
     * Seta a view
     */
    public function setView(\Dexter\View\View $view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * Separado por causa de testes unitários
     */
    public function create($class)
    {
        return new $class;
    }
}
