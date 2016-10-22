<?php

namespace DexterApp\Front\Models\DataMapper;

class VantagemTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldFetchAll()
    {
        $mapper = new Vantagem();
        $dbMock = $this->getMockBuilder('\\Dexter\\Db\\Conn')
            ->setMethods(array('fetchAll', 'doConnect'))
            ->disableOriginalConstructor()
            ->getMock();

        $dbMock->expects($this->once())
            ->method('doConnect');

        $dbMock->expects($this->once())
            ->method('fetchAll')
            ->with($this->equalTo('SELECT * FROM vantagem'))
            ->will($this->returnValue($expected = new \stdClass()));

        $mapper->setDb($dbMock);

        $this->assertSame($expected, $mapper->fetchAll());
    }
}
