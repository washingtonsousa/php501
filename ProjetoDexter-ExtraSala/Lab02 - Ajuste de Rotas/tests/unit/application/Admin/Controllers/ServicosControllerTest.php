<?php

namespace DexterApp\Admin\Controllers;

class ServicosControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetsetServicoModel()
    {
        $controller = new \DexterApp\Admin\Controllers\ServicosController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Servico')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setServicoModel($model));
        $this->assertSame($model, $controller->getservicoModel());
    }

    public function testShouldGetDefaultservicoModel()
    {
        $controller = new \DexterApp\Admin\Controllers\ServicosController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\Servico',
            $controller->getservicoModel()
        );
    }

    public function testIndexAction()
    {
        $controller = new \DexterApp\Admin\Controllers\ServicosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Servico')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getServicos')
            ->will($this->returnValue($servicos = array(1, 2, 3, 4, 5)));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('servicos'), $this->equalTo($servicos));

        $controller->setServicoModel($modelMock)
            ->actionIndex($reqMock, $viewMock);
    }

    public function testEditAction()
    {
        $controller = new \DexterApp\Admin\Controllers\ServicosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Servico')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getservico')
            ->with($this->equalTo(1))
            ->will($this->returnValue($servico = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('servico'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($servico),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setServicoModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }


    public function testEditActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\ServicosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Servico')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getServico')
            ->with($this->equalTo(1))
            ->will($this->returnValue($servico = new \stdClass()));

        $viewMock->expects($this->exactly(3))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('servico'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($servico),
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

        $controller->setServicoModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\ServicosController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Servico')
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

        $controller->setServicoModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }
}
