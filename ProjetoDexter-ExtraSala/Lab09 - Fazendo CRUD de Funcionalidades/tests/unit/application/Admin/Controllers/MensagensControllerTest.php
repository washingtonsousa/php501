<?php

namespace DexterApp\Admin\Controllers;

class MensagensControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetsetMensagemModel()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setMensagemModel($model));
        $this->assertSame($model, $controller->getMensagemModel());
    }

    public function testShouldGetDefaultmensagemModel()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\Mensagem',
            $controller->getMensagemModel()
        );
    }

    public function testIndexAction()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getMensagens')
            ->will($this->returnValue($mensagens = array(1, 2, 3, 4, 5)));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('mensagens'), $this->equalTo($mensagens));

        $controller->setMensagemModel($modelMock)
            ->actionIndex($reqMock, $viewMock);
    }

    public function testEditAction()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getMensagem')
            ->with($this->equalTo(1))
            ->will($this->returnValue($mensagem = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('mensagem'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($mensagem),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setMensagemModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    /**
     * @runInSeparateProcess
     */
    public function testEditActionWithPostData()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getMensagem')
            ->with($this->equalTo(1))
            ->will($this->returnValue($mensagem = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('mensagem'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($mensagem),
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

        $controller->setMensagemModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewAction()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
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

        $controller->setMensagemModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    /**
     * @runInSeparateProcess
     */
    public function testNewActionWithPostData()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
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

        $controller->setMensagemModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    public function testEditActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getMensagem')
            ->with($this->equalTo(1))
            ->will($this->returnValue($mensagem = new \stdClass()));

        $viewMock->expects($this->exactly(3))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('mensagem'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($mensagem),
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

        $controller->setMensagemModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\MensagensController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Mensagem')
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

        $controller->setMensagemModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }
}
