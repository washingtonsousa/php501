<?php

class AbstractEntityTest extends PHPUnit_Framework_TestCase
{

    public function testExisteMetodoToString()
    {
        require 'lib/Db/InterfaceIdentity.php';
        require 'lib/Db/AbstractEntity.php';
        
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\AbstractEntity::__toString');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()} \n";
        }
        
        $this->assertTrue($existe);
    }

    public function testRetornoMetodoToStringComId()
    {
        require 'app/Model/Clientes/Cliente.php';
        $cliente = new app\Model\Clientes\Cliente();
        $cliente->setId(10);
        $entidade = get_class($cliente);
        $this->assertSame("$entidade::10", (string) $cliente);
    }

    public function testRetornoMetodoToStringSemId()
    {
        $cliente = new app\Model\Clientes\Cliente();
        $entidade = get_class($cliente);
        $this->assertSame("$entidade::#", (string) $cliente);
    }
}