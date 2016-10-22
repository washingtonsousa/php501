<?php

namespace Dexter\View;

/**
 * Classe que renderiza a View e age como Delegator para armazenar/recuperar
 * informações que serão enviadas para a View
 */
class View
{

    /**
     * Objeto delegate para armazenar informações que serão enviadas para a View
     */
    private $container;

    /**
     * Recebe container
     */
    public function __construct(\ArrayObject $container)
    {
        $this->container = $container;
    }

    /**
     * Delega para container a recuperação de valores na view
     */
    public function __get($name)
    {
        // [Lab06] Trabalhando com Singleton e Métodos Mágicos
    }

    /**
     * Delega para Container a inserção de valores para a view
     */
    public function __set($name, $value)
    {
        // [Lab06] Trabalhando com Singleton e Métodos Mágicos
    }

    public function render($viewFile, \Dexter\Router\ResponseInterface $response, $header = null, $footer = null)
    {
        ob_start();

        // topo
        if ($header) {
            include $header;
        }

        // conteúdo
        include $viewFile;

        // rodapé
        if ($footer) {
            include $footer;
        }

        // captura
        $content = ob_get_clean();

        // envia
        $response->addHeaders(array('Content-type: text/html', '200 OK'))->send();
        echo $content;
    }
}
