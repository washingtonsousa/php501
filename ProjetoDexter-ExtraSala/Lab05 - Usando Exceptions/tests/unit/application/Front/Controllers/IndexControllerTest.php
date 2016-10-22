<?php

namespace DexterApp\Front\Controllers;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{

    private $controller;
    private $model;

    public function setUp()
    {
        $this->controller = $this->getMockBuilder('\\DexterApp\\Front\\Controllers\\IndexController')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();
        $this->model = $this->getMock('\\DexterApp\\Front\\Models\\Service\\Index');
    }

    public function testShouldGetSetModel()
    {
        $this->assertSame($this->controller, $this->controller->setModel($this->model));
        $this->assertSame($this->model, $this->controller->getModel());
    }

    public function testShouldGetDefaultModel()
    {
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\Service\\Index',
            $this->controller->getModel()
        );
    }

    public function testNormalRequest()
    {
        $this->model->expects($this->once())
            ->method('getBanners')
            ->will($this->returnValue($expectedBanners = new \stdClass()));

        $this->model->expects($this->once())
            ->method('getVantagens')
            ->will($this->returnValue($expectedVantagens = new \stdClass()));

        $this->model->expects($this->once())
            ->method('getFuncionalidades')
            ->will($this->returnValue($expectedFuncionalidades = new \stdClass()));

        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMock('\\Dexter\\View\\View', null, array(new \ArrayObject()));

        $this->controller->setModel($this->model);
        $this->controller->actionIndex($reqMock, $viewMock);

        $this->assertSame($expectedBanners, $viewMock->banners);
        $this->assertSame($expectedVantagens, $viewMock->vantagens);
        $this->assertSame($expectedFuncionalidades, $viewMock->funcionalidades);
    }
}
