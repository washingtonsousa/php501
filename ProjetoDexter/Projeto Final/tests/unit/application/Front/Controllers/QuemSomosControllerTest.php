<?php

namespace DexterApp\Front\Controllers;

class QuemSomosControllerTest extends \PHPUnit_Framework_TestCase
{

    private $controller;

    public function setUp()
    {
        $this->controller = $this->getMockBuilder('\\DexterApp\\Front\\Controllers\\QuemSomosController')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testNormalRequest()
    {
        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMock('\\Dexter\\View\\View', null, array(new \ArrayObject()));
        $this->controller->actionIndex($reqMock, $viewMock);
    }
}
