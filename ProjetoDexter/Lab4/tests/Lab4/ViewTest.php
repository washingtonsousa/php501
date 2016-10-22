<?php

/**
 * Laboratório 4 Task 3
 * @author Denis
 *
 */
class ViewTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileView()
    {
        $existe = false;
        
        $pathClasse = 'lib/View/View.php';
        
        if (file_exists($pathClasse)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathClasse;
    }

    /**
     * @depends testExisteFileView
     */
    public function testExisteClasseView($pathClasse)
    {
        require 'lib/Db/InterfaceIdentity.php';
        require 'lib/Db/AbstractEntity.php';
        require $pathClasse;
        $this->assertTrue(class_exists('lib\View\View'));
    }

    public function testExistePropriedades()
    {
        $propriedades = [
            'template',
            'dados',
            'layoutTopo',
            'layoutRodape'
        ];
        
        $existe = true;
        
        foreach ($propriedades as $propriedade) {
            try {
                $reflection = new ReflectionProperty('lib\View\View', $propriedade);
            } catch (ReflectionException $err) {
                $existe = false;
                echo "\n {$err->getMessage()} \n";
            }
        }
        
        $this->assertTrue($existe);
    }

    public function testExisteMetodos()
    {
        $metodos = [
            'render',
            'admin',
            'front',
        ];
        
        $existe = true;
        
        foreach ($metodos as $metodo) {
            try {
                $reflection = new ReflectionMethod("lib\View\View::$metodo");
            } catch (ReflectionException $err) {
                $existe = false;
                echo "\n {$err->getMessage()} \n";
            }
        }
        
        $this->assertTrue($existe);
    }
}