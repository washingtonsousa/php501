<?php
namespace Controller;

use Lib\View\ViewModel;

class FrontController
{

    public function run()
    {
        $rota = explode('/', $_GET['rota']);
        
        $controller = ucfirst($rota[0]);
        
        $pathView   = $controller;
        
        $controller = (isset($rota[0])) ? "Controller\\$controller" : 'Index';
        
        $action = (isset($rota[1])) ? $rota[1] : 'index';
        
        $pathView .= "/$action";
              
        $id = (isset($rota[2])) ? $rota[2] : null;
        
        $controller = new $controller();
        
        if (! method_exists($controller, $action)) {
            echo ('Rota Inválida');
            return;
            exit();
        }
        
        $dados = $controller->$action($id);
        
        ViewModel::render($pathView, $dados);
    }
}