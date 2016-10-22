<?php
use lib\Controller\AbstractController;
use app\Http\Controllers\SiteController;
require 'bootstrap/autoload.php';

/**
 * Laboratório 9 Task1
 */
class SiteControllerTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileSiteController()
    {
        $existe = false;
        
        $pathArquivo = 'app/Http/Controllers/SiteController.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    public function testExistePropriedades()
    {
        $propriedades = [
            'conexao',
            'bannerMapper',
            'servicoMapper',
            'funcionalidadeMapper',
            'clienteMapper',
            'faleConoscoMapper'
        ];
        
        $existe = true;
        
        foreach ($propriedades as $propriedade) {
            
            try {
                $reflection = new ReflectionProperty('app\Http\Controllers\SiteController', $propriedade);
            } catch (ReflectionException $erro) {
                echo "\n {$erro->getMessage()} \n";
                $existe = false;
            }
        }
        
        $this->assertTrue($existe);
    }

    public function testExtendsAbstractController()
    {
        $reflection = new ReflectionClass('app\Http\Controllers\SiteController');
        $this->assertTrue($reflection->isSubclassOf('lib\Controller\AbstractController'));
    }

    public function testExisteMetodos()
    {
        $metodos = [
            '__construct',
            'index',
            'sobre',
            'servicos',
            'cadastro'
        ];
       
        $existe = true;
        
        try {
            foreach ($metodos as $metodo) {
                $reflection = new ReflectionMethod("app\Http\Controllers\SiteController::$metodo");
            }
        } catch (ReflectionException $erro) {
            echo "\n {$erro->getMessage()}\n";
            $existe = false;
        }
        
        $this->assertTrue($existe);
    }
    
    public function testIsCallableSiteController()
    {
        $siteController = new SiteController();
        $this->assertTrue(is_callable($siteController));
    }
}