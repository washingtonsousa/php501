<?php

/**
 * Laboratório 4 Task1
 */
class TraitMensagemTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileFrontController()
    {
        $existe = false;
        
        $pathArquivo = 'lib/Mensagem/MensagemTrait.php';
        
        if (file_exists($pathArquivo)) {
            require $pathArquivo;
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    public function testExisteMetodos()
    {
        $metodos = [
            'get',
            'limpar',
            'set',
        ];
        
        $existe = true;
        
        try {
            foreach ($metodos as $metodo) {
                $reflection = new ReflectionMethod("MensagemTrait::$metodo");
            }
        } catch (ReflectionException $erro) {
            echo "\n {$erro->getMessage()}\n";
            $existe = false;
        }
        
        $this->assertTrue($existe);
    }
}