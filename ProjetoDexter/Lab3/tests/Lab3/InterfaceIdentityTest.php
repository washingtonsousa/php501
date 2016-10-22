<?php

class InterfaceIdentityTest extends PHPUnit_Framework_TestCase
{

    public function testExisteInterfaceIdentity()
    {
        $existe = false;
        
        $pathInterface = 'lib/Db/InterfaceIdentity.php';
        
        if (file_exists($pathInterface)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathInterface;
    }

    /**
     * @depends testExisteInterfaceIdentity
     */
    public function testInterfaceIdentityeInterface($pathInterface)
    {
        require_once $pathInterface;
        
        $reflection = new ReflectionClass('InterfaceIdentity');
        
        $this->assertTrue($reflection->isInterface());
        
        return $reflection;
    }

    /**
     * @depends testInterfaceIdentityeInterface
     */
    public function testExisteMetodosSetGetId($reflection)
    {
        $this->assertTrue($reflection->hasMethod('getId'));
    }
}