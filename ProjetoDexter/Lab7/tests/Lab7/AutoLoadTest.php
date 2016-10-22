<?php

/**
 * Laboratório 7 Task1
 */
class AutoLoadTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileAutoLoad()
    {
        $existe = false;
        
        $pathArquivo = 'bootstrap/autoload.php';
        
        if (file_exists($pathArquivo)) {
            require $pathArquivo;
            $existe = true;
        }
        
        $this->assertTrue($existe);
    }

    public function testConsegueCarregarClasse()
    {
        $consegue = true;
        
        $this->assertTrue(class_exists('app\Model\Clientes\Cliente', true));
    }
}