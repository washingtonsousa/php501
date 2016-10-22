<?php

namespace DexterApp\Admin\Controllers;

class ClientesControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetClienteModel()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setClienteModel($model));
        $this->assertSame($model, $controller->getClienteModel());
    }

    public function testShouldGetDefaultClienteModel()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\Cliente',
            $controller->getClienteModel()
        );
    }

    public function testIndexAction()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getClientes')
            ->will($this->returnValue($clientes = array(1, 2, 3, 4, 5)));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('clientes'), $this->equalTo($clientes));

        $controller->setClienteModel($modelMock)
            ->actionIndex($reqMock, $viewMock);
    }

    public function testEditAction()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getCliente')
            ->with($this->equalTo(1))
            ->will($this->returnValue($cliente = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('cliente'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($cliente),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setClienteModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    /**
     * @runInSeparateProcess
     */
    public function testEditActionWithPostData()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getCliente')
            ->with($this->equalTo(1))
            ->will($this->returnValue($cliente = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('cliente'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($cliente),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));

        $reqMock->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue($params = array(1, 2, 3, 4, 5)));

        $modelMock->expects($this->once())
            ->method('save')
            ->with($this->equalTo($params));

        $controller->setClienteModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testEditActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getCliente')
            ->with($this->equalTo(1))
            ->will($this->returnValue($cliente = new \stdClass()));

        $viewMock->expects($this->exactly(3))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('cliente'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($cliente),
                    $this->equalTo(''),
                    $this->equalTo('error')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));

        $reqMock->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue($params = array(1, 2, 3, 4, 5)));

        $modelMock->expects($this->once())
            ->method('save')
            ->with($this->equalTo($params))
            ->will($this->throwException(new \Exception('error')));

        $controller->setClienteModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewAction()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('msg'), $this->equalTo(''));

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setClienteModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    /**
     * @runInSeparateProcess
     */
    public function testNewActionWithPostData()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('msg'), $this->equalTo(''));

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));

        $reqMock->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue($params = array(1, 2, 3, 4, 5)));

        $modelMock->expects($this->once())
            ->method('save')
            ->with($this->equalTo($params));

        $controller->setClienteModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    public function testNewActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\ClientesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with($this->equalTo('msg'), $this->logicalOr($this->equalTo(''), $this->equalTo('error')));

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));

        $reqMock->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue($params = array(1, 2, 3, 4, 5)));

        $modelMock->expects($this->once())
            ->method('save')
            ->with($this->equalTo($params))
            ->will($this->throwException(new \Exception('error')));

        $controller->setClienteModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }
}
