<?php
use app\Http\Controllers\SiteController;
use lib\Controller\FrontController;
require 'bootstrap/autoload.php';

/**
 * Laboratório 9 Task1
 */
class FrontControllerTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileFrontController()
    {
        $existe = false;
        
        $pathArquivo = 'lib/Controller/FrontController.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    public function testExisteAtributoRotas()
    {
        $existe = true;
        try {
            $reflection = new ReflectionProperty('lib\Controller\FrontController', 'rotas');
        } catch (ReflectionException $erro) {
            echo "\n {$erro->getMessage()} \n";
            $existe = false;
        }
        $this->assertTrue($existe);
    }

    public function testExisteMetodoConstrutor()
    {
        $existe = true;
        try {
            $reflection = new ReflectionMethod('lib\Controller\FrontController::__construct');
        } catch (ReflectionException $erro) {
            echo "\n {$erro->getMessage()} \n";
            $existe = false;
        }
        $this->assertTrue($existe);
    }

    public function testExisteMetodoRun()
    {
        $existe = true;
        try {
            $reflection = new ReflectionMethod('lib\Controller\FrontController::run');
        } catch (ReflectionException $erro) {
            echo "\n {$erro->getMessage()} \n";
            $existe = false;
        }
        $this->assertTrue($existe);
    }
}