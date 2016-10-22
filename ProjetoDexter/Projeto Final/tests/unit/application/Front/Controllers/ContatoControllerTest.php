<?php

namespace DexterApp\Front\Controllers;

class ContatoControllerTest extends \PHPUnit_Framework_TestCase
{

    private $controller;

    public function setUp()
    {
        $this->controller = $this->getMockBuilder('\\DexterApp\\Front\\Controllers\\ContatoController')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();
        $this->model = $this->getMock('\\DexterApp\\Front\\Models\\Service\\Contato');
    }

    public function testNormalRequest()
    {
        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));
        $viewMock = $this->getMock('\\Dexter\\View\\View', null, array(new \ArrayObject()));

        $this->controller->actionIndex($reqMock, $viewMock);

        $this->assertSame('', $viewMock->msg);
    }

    public function testPostRequest()
    {
        $params = array('nome' => 'John');

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

        $this->assertSame('Formulário enviado com sucesso!', $viewMock->msg);
    }
}
