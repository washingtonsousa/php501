<?php

namespace DexterApp\Admin\Controllers;

class UsuariosControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetsetUserModel()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setUserModel($model));
        $this->assertSame($model, $controller->getUserModel());
    }

    public function testShouldGetDefaultusuarioModel()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\User',
            $controller->getUserModel()
        );
    }

    public function testIndexAction()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getUsers')
            ->will($this->returnValue($usuarios = array(1, 2, 3, 4, 5)));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('users'), $this->equalTo($usuarios));

        $controller->setUserModel($modelMock)
            ->actionIndex($reqMock, $viewMock);
    }

    public function testEditAction()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getUser')
            ->with($this->equalTo(1))
            ->will($this->returnValue($usuario = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('user'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($usuario),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setUserModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }


    public function testNewAction()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
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

        $controller->setUserModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    public function testEditActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getUser')
            ->with($this->equalTo(1))
            ->will($this->returnValue($user = new \stdClass()));

        $viewMock->expects($this->exactly(3))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('user'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($user),
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

        $controller->setUserModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\UsuariosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
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

        $controller->setUserModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }
}
