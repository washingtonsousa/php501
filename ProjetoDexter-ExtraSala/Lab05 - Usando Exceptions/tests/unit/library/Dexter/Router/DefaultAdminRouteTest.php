<?php

namespace DexterTests\Router;

class DefaultAdminRouteTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetView()
    {
        $defaultRoute = new \Dexter\Router\DefaultAdminRoute();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($defaultRoute, $defaultRoute->setView($viewMock));
        $this->assertSame($viewMock, $defaultRoute->getView());
    }

    public function testShouldGetDefaultView()
    {
        $defaultRoute = new \Dexter\Router\DefaultAdminRoute();
        $this->assertInstanceOf(
            '\\Dexter\\View\\View',
            $defaultRoute->getView()
        );
    }

    public function testShouldExecuteRoute()
    {
        $defaultRoute = $this->getMockBuilder('\\Dexter\\Router\\DefaultAdminRoute')
            ->setMethods(array('create'))
            ->getMock();

        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder('\\Dexter\\Router\\Response')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->disableOriginalConstructor()
            ->getMock();
        $controllerMock = $this->getMockBuilder('\\DexterApp\\Admin\\Controllers\\IndexController')
            ->disableOriginalConstructor()
            ->getMock();

        $reqMock->expects($this->once())
            ->method('getUri')
            ->will($this->returnValue('/admin/index/login/1'));

        $defaultRoute->expects($this->once())
            ->method('create')
            ->with($this->equalTo('\\DexterApp\\Admin\\Controllers\\IndexController'))
            ->will($this->returnValue($controllerMock));

        $controllerMock->expects($this->once())
            ->method('actionLogin')
            ->with($this->equalTo($reqMock), $this->equalTo($viewMock), $this->equalTo(1));

        $viewMock->expects($this->once())
            ->method('render');

        $defaultRoute->setView($viewMock);

        $defaultRoute->match($reqMock);
        $defaultRoute->run(array($reqMock, $responseMock));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldExecuteRouteHOME()
    {
        $segmentMock = $this->getMockBuilder('\\Dexter\\Session\\Segment')
            ->disableOriginalConstructor()
            ->setMethods(array('__isset'))
            ->getMock();

        $defaultRoute = $this->getMockBuilder('\\Dexter\\Router\\DefaultAdminRoute')
            ->setMethods(array('create'))
            ->getMock();

        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder('\\Dexter\\Router\\Response')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->disableOriginalConstructor()
            ->getMock();
        $controllerMock = $this->getMockBuilder('\\DexterApp\\Admin\\Controllers\\IndexController')
            ->disableOriginalConstructor()
            ->getMock();

        $reqMock->expects($this->once())
            ->method('getUri')
            ->will($this->returnValue('/admin/'));

        $segmentMock->expects($this->once())
            ->method('__isset')
            ->with($this->equalTo('login'))
            ->will($this->returnValue('dexter'));

        $defaultRoute->expects($this->once())
            ->method('create')
            ->with($this->equalTo('\\DexterApp\\Admin\\Controllers\\IndexController'))
            ->will($this->returnValue($controllerMock));

        $controllerMock->expects($this->once())
            ->method('actionIndex')
            ->with($this->equalTo($reqMock), $this->equalTo($viewMock));

        $viewMock->expects($this->once())
            ->method('render');

        $defaultRoute->setView($viewMock)->setUser($segmentMock);

        $defaultRoute->match($reqMock);
        $defaultRoute->run(array($reqMock, $responseMock));
    }

    public function testShouldCreate()
    {
        $route = new \Dexter\Router\DefaultAdminRoute();
        $this->assertEquals(new \stdClass, $route->create('\\stdClass'));
    }
}
