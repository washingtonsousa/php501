<?php

namespace DexterApp\Front\Controllers;

class ServicosControllerTest extends \PHPUnit_Framework_TestCase
{

    private $controller;
    private $model;

    public function setUp()
    {
        $this->controller = $this->getMockBuilder('\\DexterApp\\Front\\Controllers\\ServicosController')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();
        $this->model = $this->getMock('\\DexterApp\\Front\\Models\\Service\\Servicos');
    }

    public function testShouldGetSetModel()
    {
        $this->assertSame($this->controller, $this->controller->setModel($this->model));
        $this->assertSame($this->model, $this->controller->getModel());
    }

    public function testShouldGetDefaultModel()
    {
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\Service\\Servicos',
            $this->controller->getModel()
        );
    }

    public function testNormalRequest()
    {
        $this->model->expects($this->once())
            ->method('getServicos')
            ->will($this->returnValue($expectedServicos = new \stdClass()));

        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMock('\\Dexter\\View\\View', null, array(new \ArrayObject()));

        $this->controller->setModel($this->model);
        $this->controller->actionIndex($reqMock, $viewMock);

        $this->assertSame($expectedServicos, $viewMock->servicos);
    }
}
