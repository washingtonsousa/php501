<?php

namespace DexterTests\View;

class ViewTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetAndSetContainerOnView()
    {
        $containerMock = $this->getMockBuilder('\\Dexter\\View\\Container')
            ->disableOriginalConstructor()
            ->getMock();

        $containerMock->expects($this->exactly(2))
            ->method('offsetSet')
            ->with($this->equalTo('a'), $this->logicalOr($this->equalTo(1), $this->equalTo(2)));
        $containerMock->expects($this->once())
            ->method('offsetGet')
            ->with($this->equalTo('a'))
            ->will($this->returnValue(1));

        $view = new \Dexter\View\View($containerMock);
        $view->a = 1;
        $view->a = $view->a + 1;
    }

    public function testShouldRender()
    {
        $responseMock = $this->getMock('\\Dexter\\Router\\Response');
        $responseMock->expects($this->once())
            ->method('addHeaders')
            ->will($this->returnValue($responseMock));

        $responseMock->expects($this->once())
            ->method('send');

        $tmpFile = __DIR__ . '/tmpfile';
        $headerTmpFile = __DIR__ . '/header';
        $footerTmpFile = __DIR__ . '/footer';

        file_put_contents($tmpFile, 'b');
        file_put_contents($headerTmpFile, 'a');
        file_put_contents($footerTmpFile, 'c');

        ob_start();

        $view = new \Dexter\View\View(new \Dexter\View\Container());
        $view->render($tmpFile, $responseMock, $headerTmpFile, $footerTmpFile);

        unlink($tmpFile);
        unlink($headerTmpFile);
        unlink($footerTmpFile);

        $this->assertSame('abc', ob_get_clean());
    }
}
