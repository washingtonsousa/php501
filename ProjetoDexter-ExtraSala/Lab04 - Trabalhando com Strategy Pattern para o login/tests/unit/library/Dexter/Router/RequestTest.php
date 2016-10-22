<?php

namespace DexterTests\Router;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetUri()
    {
        $request = new \Dexter\Router\Request();

        $_GET['q'] = $expected = '/minha-uri';

        $this->assertSame($expected, $request->getUri());
    }

    public function testShouldGetParamWithGet()
    {
        $request = new \Dexter\Router\Request();

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = array('myParam' => $expected = 'myValue');

        $this->assertSame($expected, $request->getParam('myParam'));
    }

    public function testShouldGetParamWithGetAndDefault()
    {
        $request = new \Dexter\Router\Request();

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = array();

        $this->assertSame('default', $request->getParam('myParam', 'default'));
    }

    public function testShouldGetParamWithPost()
    {
        $request = new \Dexter\Router\Request();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = array('myParam' => $expected = 'myValue');

        $this->assertSame($expected, $request->getParam('myParam'));
    }

    public function testShouldGetAllParamsWithGet()
    {
        $request = new \Dexter\Router\Request();

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = $expected = array('p1' => 1, 'p2' => 2, 'p3' => 3);

        $this->assertSame($expected, $request->getParams());
    }

    public function testShouldGetAllParamsWithPost()
    {
        $request = new \Dexter\Router\Request();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = $expected = array('p1' => 1, 'p2' => 2, 'p3' => 3);

        $this->assertSame($expected, $request->getParams());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testShouldThrowExceptionWithUnsupportedHTTPMethod()
    {
        $request = new \Dexter\Router\Request();

        $_SERVER['REQUEST_METHOD'] = 'PUT';

        $request->getParams();
    }

    public function testShouldTestForPost()
    {
        $request = new \Dexter\Router\Request();
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->assertTrue($request->isPost());
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $this->assertFalse($request->isPost());
    }


}
