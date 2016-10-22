<?php

namespace DexterApp\Admin\Controllers;

class DestaquesControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetsetDestaqueModel()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setDestaqueModel($model));
        $this->assertSame($model, $controller->getDestaqueModel());
    }

    public function testShouldGetDefaultDestaqueModel()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\Destaque',
            $controller->getDestaqueModel()
        );
    }

    public function testIndexAction()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getDestaques')
            ->will($this->returnValue($destaques = array(1, 2, 3, 4, 5)));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('destaques'), $this->equalTo($destaques));

        $controller->setDestaqueModel($modelMock)
            ->actionIndex($reqMock, $viewMock);
    }

    public function testEditAction()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getDestaque')
            ->with($this->equalTo(1))
            ->will($this->returnValue($destaque = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('destaque'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($destaque),
                    $this->equalTo('')
                )
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));

        $controller->setDestaqueModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    /**
     * @runInSeparateProcess
     */
    public function testEditActionWithPostData()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getDestaque')
            ->with($this->equalTo(1))
            ->will($this->returnValue($destaque = new \stdClass()));

        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('destaque'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($destaque),
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

        $controller->setDestaqueModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewAction()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
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

        $controller->setDestaqueModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    /**
     * @runInSeparateProcess
     */
    public function testNewActionWithPostData()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
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

        $controller->setDestaqueModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }

    public function testEditActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();

        $modelMock->expects($this->once())
            ->method('getDestaque')
            ->with($this->equalTo(1))
            ->will($this->returnValue($destaque = new \stdClass()));

        $viewMock->expects($this->exactly(3))
            ->method('__set')
            ->with(
                $this->logicalOr(
                    $this->equalTo('destaque'),
                    $this->equalTo('msg')
                ),
                $this->logicalOr(
                    $this->equalTo($destaque),
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

        $controller->setDestaqueModel($modelMock)
            ->actionEdit($reqMock, $viewMock, 1);
    }

    public function testNewActionWithPostDataButWithError()
    {
        $controller = new \DexterApp\Admin\Controllers\DestaquesController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $modelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\Destaque')
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

        $controller->setDestaqueModel($modelMock)
            ->actionNew($reqMock, $viewMock);
    }
}
