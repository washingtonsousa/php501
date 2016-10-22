<?php

namespace DexterApp\Admin\Controllers;

class FuncionalidadesControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetsetFuncionalidadeModel()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Funcionalidade')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setFuncionalidadeModel($model));
        $this->assertSame($model, $controller->getFuncionalidadeModel());
    }

    public function testShouldGetDefaultFuncionalidadeModel()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\Funcionalidade',
            $controller->getFuncionalidadeModel()
        );
    }

    public function testIndexAction()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Funcionalidade')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getFuncionalidades')
            ->will($this->returnValue($funcionalidades = array(1, 2, 3, 4, 5)));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('funcionalidades'), $this->equalTo($funcionalidades));

        $controller->setFuncionalidadeModel($modelMock)
            ->actionIndex($reqMock, $viewMock);
    }

    public function testEditAction()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Funcionalidade')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getFuncionalidade')
            ->with($this->equalTo(1))
            ->will($this->returnValue($funcionalidade = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('funcionalidade'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($funcionalidade),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setFuncionalidadeModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewAction()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Funcionalidade')
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

        $controller->setFuncionalidadeModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    public function testEditActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Funcionalidade')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getFuncionalidade')
            ->with($this->equalTo(1))
            ->will($this->returnValue($funcionalidade = new \stdClass()));

        $viewMock->expects($this->exactly(3))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('funcionalidade'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($funcionalidade),
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

        $controller->setFuncionalidadeModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\FuncionalidadesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Funcionalidade')
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

        $controller->setFuncionalidadeModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }
}
