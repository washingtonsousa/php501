<?php

/**
 * Laboratório 6 Task4
 */
class AbstractMapperTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileAbstractMapper()
    {
        $existe = false;
        
        $pathArquivo = 'lib/Db/AbstractDataMapper.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    /**
     * @depends testExisteFileAbstractMapper
     */
    public function testChecaTestExisteMetodoConstrutor($pathArquivo)
    {
        require_once $pathArquivo;
        
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\AbstractDataMapper::__construct');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExisteAtributoTableGateway()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionProperty('lib\Db\AbstractDataMapper', 'tableGateway');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExisteMetodoAbstratoConverterParaObjeto()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\AbstractDataMapper::converterParaObjeto');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($reflection->isAbstract());
        $this->assertTrue($existe);
    }

    public function testChecaExisteMetodoAbstratoConverterParaArray()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\AbstractDataMapper::converterParaArray');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($reflection->isAbstract());
        $this->assertTrue($existe);
    }

    public function testExisteMetodos()
    {
        $existe = true;
        $metodos = [
            'obterPorId',
            'obterTodos',
            'inserir',
            'alterar',
            'remover'
        ];
        
        try {
            foreach ($metodos as $metodo) {
                $reflection = new ReflectionMethod("lib\Db\AbstractDataMapper::$metodo");
            }
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }
}