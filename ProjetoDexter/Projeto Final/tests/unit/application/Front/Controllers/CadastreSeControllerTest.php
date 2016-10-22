<?php

namespace DexterApp\Front\Controllers;

class CadastreSeControllerTest extends \PHPUnit_Framework_TestCase
{

    private $controller;
    private $model;

    public function setUp()
    {
        $this->controller = $this->getMockBuilder('\\DexterApp\\Front\\Controllers\\CadastreSeController')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();
        $this->model = $this->getMock('\\DexterApp\\Front\\Models\\Service\\CadastreSe');
    }

    public function testShouldGetSetModel()
    {
        $this->assertSame($this->controller, $this->controller->setModel($this->model));
        $this->assertSame($this->model, $this->controller->getModel());
    }

    public function testShouldGetDefaultModel()
    {
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\Service\\CadastreSe',
            $this->controller->getModel()
        );
    }

    public function testNormalRequest()
    {
        $this->model->expects($this->once())
            ->method('getEstados')
            ->will($this->returnValue($expectedEstados = new \stdClass()));

        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));
        $viewMock = $this->getMock('\\Dexter\\View\\View', null, array(new \ArrayObject()));

        $this->controller->setModel($this->model);
        $this->controller->actionIndex($reqMock, $viewMock);

        $this->assertSame($expectedEstados, $viewMock->estados);
        $this->assertSame('', $viewMock->msg);
    }

    public function testPostRequest()
    {
        $params = array('nome' => 'John');

        $this->model->expects($this->once())
            ->method('getEstados')
            ->will($this->returnValue($expectedEstados = new \stdClass()));
        $this->model->expects($this->once())
            ->method('save')
            ->with($this->equalTo($params));

        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));
        $reqMock->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue($params));

        $viewMock = $this->getMock('\\Dexter\\View\\View', null, array(new \ArrayObject()));

        $this->controller->setModel($this->model);
        $this->controller->actionIndex($reqMock, $viewMock);

        $this->assertSame($expectedEstados, $viewMock->estados);
        $this->assertSame('Formulário enviado com sucesso!', $viewMock->msg);
    }
}
