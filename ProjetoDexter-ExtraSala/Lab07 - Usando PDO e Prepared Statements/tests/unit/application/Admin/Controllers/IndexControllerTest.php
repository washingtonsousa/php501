<?php

namespace DexterApp\Admin\Controllers;

use DexterApp\Admin\Models\Exceptions\InvalidUserOrPasswordException;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetUserModel()
    {
        $controller = new \DexterApp\Admin\Controllers\IndexController();
        $model = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertSame($controller, $controller->setUserModel($model));
        $this->assertSame($model, $controller->getUserModel());
    }

    public function testShouldGetDefaultUserModel()
    {
        $controller = new \DexterApp\Admin\Controllers\IndexController();
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\Service\\User',
            $controller->getUserModel()
        );
    }

    public function testShouldMakeLoginWithPostRequest()
    {
        $user = 'dexter';
        $pass = '123456';

        $controller = new \DexterApp\Admin\Controllers\IndexController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $userModelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->disableOriginalConstructor()
            ->getMock();

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));
        $reqMock->expects($this->exactly(2))
            ->method('getParam')
            ->with($this->logicalOr($this->equalTo('user_login'), $this->equalTo('pass_login')))
            ->will($this->returnCallback(function ($v) use ($user, $pass) {
                if ($v === 'user_login') {
                    return $user;
                }
                return $pass;
            }));
        $userModelMock->expects($this->once())
            ->method('login')
            ->with($this->equalTo($user), $this->equalTo($pass));

        $controller->setUserModel($userModelMock)
            ->actionLogin($reqMock, $viewMock);
    }

    public function testShouldLoadLoginPageWithGetRequest()
    {
        $controller = new \DexterApp\Admin\Controllers\IndexController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $userModelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->disableOriginalConstructor()
            ->getMock();

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(false));
        $userModelMock->expects($this->never())
            ->method('login');

        $controller->setUserModel($userModelMock)
            ->actionLogin($reqMock, $viewMock);
    }

    public function testShouldNotAuthenticateWithInvalidUserAndOrPassword()
    {
        $user = 'dexter';
        $pass = '123456';

        $controller = new \DexterApp\Admin\Controllers\IndexController();
        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $userModelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock->expects($this->exactly(2))
            ->method('__set')
            ->with(
                $this->equalTo('msg'),
                $this->logicalOr($this->equalTo(''), $this->equalTo('Usuário e/ou senha inválidos!'))
            );

        $reqMock->expects($this->once())
            ->method('isPost')
            ->will($this->returnValue(true));
        $reqMock->expects($this->exactly(2))
            ->method('getParam')
            ->with($this->logicalOr($this->equalTo('user_login'), $this->equalTo('pass_login')))
            ->will($this->returnCallback(function ($v) use ($user, $pass) {
                if ($v === 'user_login') {
                    return $user;
                }
                return $pass;
            }));
        $userModelMock->expects($this->once())
            ->method('login')
            ->with($this->equalTo($user), $this->equalTo($pass))
            ->will($this->throwException(
                new InvalidUserOrPasswordException('error')
            ));

        $controller->setUserModel($userModelMock)
            ->actionLogin($reqMock, $viewMock);
    }

    public function testShouldWorkCorrectlyAdminMainPage()
    {
        $controller = new \DexterApp\Admin\Controllers\IndexController();

        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $userModelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->setMethods(array('getUser'))
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->setMethods(array('__set'))
            ->disableOriginalConstructor()
            ->getMock();
        $segmentMock = $this->getMockBuilder('\\Dexter\\Session\\Segment')
            ->setMethods(array('__get'))
            ->disableOriginalConstructor()
            ->getMock();

        $userModelMock->expects($this->once())
            ->method('getUser')
            ->will($this->returnValue($segmentMock));

        $segmentMock->expects($this->once())
            ->method('__get')
            ->with($this->equalTo('login'))
            ->will($this->returnValue($login = 'dexter'));

        $viewMock->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('user'), $this->equalTo($login));

        $controller->setUserModel($userModelMock);

        $controller->actionIndex($reqMock, $viewMock);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldLogout()
    {
        $controller = new \DexterApp\Admin\Controllers\IndexController();

        $reqMock = $this->getMock('\\Dexter\\Router\\Request');
        $userModelMock = $this->getMockBuilder('\\DexterApp\\Admin\\Models\\Service\\User')
            ->setMethods(array('logout'))
            ->disableOriginalConstructor()
            ->getMock();
        $viewMock = $this->getMockBuilder('\\Dexter\\View\\View')
            ->disableOriginalConstructor()
            ->getMock();

        $userModelMock->expects($this->once())
            ->method('logout');

        $controller->setUserModel($userModelMock);

        $controller->actionLogout($reqMock, $viewMock);
    }
}
