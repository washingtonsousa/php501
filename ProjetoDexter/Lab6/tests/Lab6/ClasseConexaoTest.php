<?php

/**
 * Laboratório 6 Task2
 * @author Denis
 *
 */
class ClasseConexaoTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileClasseConexao()
    {
        $existe = false;
        
        $pathArquivo = 'lib/Db/Conexao.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    /**
     * @depends testExisteFileClasseConexao
     */
    public function testchecaTestExisteMetodoGet($pathArquivo)
    {
        require $pathArquivo;
        
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\Conexao::get');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaInstanciaPDO()
    {
        require 'config/config.php';
        $conexao = new lib\Db\Conexao($config);
        $retorno = $conexao->get();
        $this->assertInstanceOf('PDO', $retorno);
    }
}