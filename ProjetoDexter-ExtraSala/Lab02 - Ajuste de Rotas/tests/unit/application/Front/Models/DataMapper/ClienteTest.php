<?php

namespace DexterApp\Front\Models\DataMapper;

use DexterApp\Front\Models\Entity;

class ClienteTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldInsert()
    {
        $mapper = new Cliente();
        $dbMock = $this->getMockBuilder('\\Dexter\\Db\\Conn')
            ->setMethods(array('insert', 'doConnect'))
            ->disableOriginalConstructor()
            ->getMock();

        $dbMock->expects($this->once())
            ->method('doConnect');

        $dbMock->expects($this->once())
            ->method('insert')
            ->will($this->returnValue($expected = new \stdClass()));

        $mapper->setDb($dbMock);

        $cliente = new Entity\Cliente(array('id' => 1));

        $this->assertSame($expected, $mapper->insert($cliente));
    }

    public function testShouldGetDefaultDb()
    {
        $mapper = new Cliente();
        $this->assertInstanceOf('\\Dexter\\Db\\Conn', $mapper->getDb());
    }
}
