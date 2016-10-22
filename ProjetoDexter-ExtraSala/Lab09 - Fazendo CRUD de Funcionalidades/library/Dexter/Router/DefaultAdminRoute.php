<?php

namespace Dexter\Router;

use Dexter\Session\Manager;
use Dexter\Session\Segment;

/**
 * Rota padrão sistema para carregamento dos controladores
 */
class DefaultAdminRoute extends Route
{

    private $logado = false;
    private $user;

    /**
     * Padrão da rota default
     */
    const PATTERN           = '@^/(admin)/?(?:([^/]+)(?:/([^/]+)(?:/([^/]+))?)?)?$@';

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
        $uid = $this->getId();
        $viewFile = $this->getViewFile();

        // usuário logado
        if ($this->login($controller, $action)) {
            $class = "\\DexterApp\\{$module}\\Controllers\\{$controller}";

            // executa controller
            $stopRendering = $this->create($class)->{$action}($request, $this->getView(), $uid);

            // renderiza view
            if ($stopRendering !== false) {
                $this->getView()->render($viewFile, $response, $this->getHeader(), $this->getFooter());
            }
        }
    }

    /**
     * Recupera o nome do módulo
     */
    private function getModule()
    {
        return $this->camelCase($this->argsUrl[0]);
    }

    /**
     * Recupera o nome do controller
     */
    private function getController()
    {
        if (isset($this->argsUrl[1])) {
            return $this->camelCase($this->argsUrl[1]) . 'Controller';
        }
        return self::INDEX_CONTROLLER;
    }

    /**
     * Recupera o nome da action
     */
    private function getAction()
    {
        if (isset($this->argsUrl[2])) {
            return 'action' . $this->camelCase($this->argsUrl[2]);
        }
        return self::INDEX_ACTION;
    }

    /**
     * Recupera o ID
     */
    private function getId()
    {
        if (isset($this->argsUrl[3])) {
            return $this->argsUrl[3];
        }
        return null;
    }

    private function getViewFile()
    {
        $controller = isset($this->argsUrl[1]) ? $this->argsUrl[1] : 'index';
        $action = isset($this->argsUrl[2]) ? $this->argsUrl[2] : 'index';
        return __DIR__ . "/../../../application/Admin/Views/{$controller}/{$action}.php";
    }

    private function login($controller, $action)
    {
        $this->logado = false;

        if ($controller === 'IndexController' && $action === 'actionLogin') {
            return true;
        }

        $user = $this->getUser();
        if (!isset($user->login)) {
            header('Location: ?q=admin/index/login');
            return false;
        }

        $this->logado = true;
        return true;
    }

    /**
     * Topo das views
     */
    private function getHeader()
    {
        $full = $this->logado ? '-full' : '';
        return __DIR__ . "/../../../application/Admin/Views/topo{$full}.php";
    }

    /**
     * Rodapé das views
     */
    private function getFooter()
    {
        $full = $this->logado ? '-full' : '';
        return __DIR__ . "/../../../application/Admin/Views/rodape{$full}.php";
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

    public function getUser()
    {
        if (!$this->user) {
            $this->user = new Segment(Manager::getInstance(), 'user');
        }
        return $this->user;
    }

    public function setUser(Segment $user)
    {
        $this->user = $user;
        return $this;
    }
}
