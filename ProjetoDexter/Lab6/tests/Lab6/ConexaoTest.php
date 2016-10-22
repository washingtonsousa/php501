<?php

/**
 * Laboratório 6 Task1
 * @author Denis
 *
 */
class ConexaoTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileConfig()
    {
        $existe = false;
        
        $pathArquivo = 'config/config.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    /**
     * @depends testExisteFileConfig
     */
    public function testChecaArrayConfig($pathArquivo)
    {
        require $pathArquivo;
               
        $config2 = array(
            'db' => array(
                'dsn' => 'pgsql:dbname=dexter;host=localhost',
                'user' => 'dexter',
                'pass' => '123456'
            )
        );
        
        $diffChaveDb  = array_diff_key($config, $config2);
        $diffConteudo = array_diff_key($config['db'], $config2['db']);
        
        $this->assertCount(0, $diffChaveDb);
        $this->assertCount(0, $diffConteudo);
    }
}