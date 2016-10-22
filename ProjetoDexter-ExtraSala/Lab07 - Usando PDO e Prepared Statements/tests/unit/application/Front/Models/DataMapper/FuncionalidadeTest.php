<?php

namespace DexterApp\Front\Models\DataMapper;

class FuncionalidadeTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldFetchAll()
    {
        $mapper = new Funcionalidade();
        $dbMock = $this->getMockBuilder('\\Dexter\\Db\\Conn')
            ->setMethods(array('fetchAll', 'doConnect'))
            ->disableOriginalConstructor()
            ->getMock();

        $dbMock->expects($this->once())
            ->method('doConnect');

        $dbMock->expects($this->once())
            ->method('fetchAll')
            ->with($this->equalTo('SELECT * FROM funcionalidade'))
            ->will($this->returnValue($expected = new \stdClass()));

        $mapper->setDb($dbMock);

        $this->assertSame($expected, $mapper->fetchAll());
    }
}
