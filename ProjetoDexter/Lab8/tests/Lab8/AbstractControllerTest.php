<?php
use lib\Controller\AbstractController;
require 'bootstrap/autoload.php';

/**
 * Laboratório 9 Task1
 */
class AbstractControllerTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileFrontController()
    {
        $existe = false;
        
        $pathArquivo = 'lib/Controller/AbstractController.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    public function testExisteMetodoInvoke()
    {
        $existe = true;
        try {
            $reflection = new ReflectionMethod('lib\Controller\AbstractController::__invoke');
        } catch (ReflectionException $erro) {
            echo "\n {$erro->getMessage()} \n";
            $existe = false;
        }
        $this->assertTrue($existe);
    }
}