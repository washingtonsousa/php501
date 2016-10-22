<?php
use lib\Controller\AbstractController;
require 'bootstrap/autoload.php';

/**
 * Laboratório 9 Task1
 */
class ControllersTest extends PHPUnit_Framework_TestCase
{

    public function testExisteControllers()
    {
        $existe = true;
        
        $controllers = [
            'ClienteController',
            'FaleConoscoController',
            'FuncionalidadeController',
            'HomeController',
            'ServicoController',
            'HomeController'
        ];
        
        foreach ($controllers as $controller) {
            
            $pathArquivo = "app/Http/Controllers/Admin/$controller.php";
            
            if (! file_exists($pathArquivo)) {
                echo "\n $pathArquivo não foi criado \n";
                $existe = false;
            }
        }
        
        $this->assertTrue($existe);
    }

    public function testExisteMetodosNosControllers()
    {
        $existe = true;
        
        $controllers = [
            'ClienteController',
            'FuncionalidadeController',
            'ServicoController',
            'FuncionarioController'
        ];
        
        $metodos = [
            '__construct',
            'index',
            'inserir',
            'editar',
            'excluir'
        ];
        
        foreach ($controllers as $controller) {
            
            try {
                $reflection = new ReflectionMethod("app\Http\Controllers\Admin\\$controller::__construct");
                $reflection = new ReflectionMethod("app\Http\Controllers\Admin\\$controller::index");
                $reflection = new ReflectionMethod("app\Http\Controllers\Admin\\$controller::inserir");
                $reflection = new ReflectionMethod("app\Http\Controllers\Admin\\$controller::editar");
                $reflection = new ReflectionMethod("app\Http\Controllers\Admin\\$controller::excluir");
            } catch (ReflectionException $erro) {
                echo "\n {$erro->getMessage()} \n";
                $existe = false;
            }
            
        }
        
        $this->assertTrue($existe);
    }
}