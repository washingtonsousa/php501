<?php

namespace DexterTests\Router;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testAddHeader()
    {
        $response = new \Dexter\Router\Response();

        $header = 'Content-type: text/html';

        $response->addHeader($header);

        $this->assertSame(array($header), $response->getHeaders());

        $outroHeader = 'Content-length: 1000';
        $response->addHeader($outroHeader);

        $this->assertSame(array($header, $outroHeader), $response->getHeaders());
    }

    public function testAddHeaders()
    {
        $response = new \Dexter\Router\Response();

        $header = 'Content-type: text/xml';
        $outroHeader = 'Content-length: 1000';

        $response->addHeaders($expected = array($header, $outroHeader));

        $this->assertSame($expected, $response->getHeaders());
    }

    public function testGetHeaders()
    {
        $response = new \Dexter\Router\Response();
        $response->addHeader($expected = 'teste');
        $this->assertSame(array($expected), $response->getHeaders());
    }

    /**
     * @runInSeparateProcess
     */
    public function testSendHeadersWithColon()
    {
        $response = new \Dexter\Router\Response();

        $headerSenderMock = $this->getMock('\\Dexter\\Http\\Header');
        $headerSenderMock->expects($this->once())
            ->method('send')
            ->with($this->equalTo($headers = array(
                'Content-type: text/xml',
                'Content-length: 1000'
            )));

        $response->setHeaderSender($headerSenderMock)
                 ->addHeaders($headers)
                 ->send();
    }

    public function testSendHeadersWithoutColon()
    {
        $response = new \Dexter\Router\Response();

        $headerSenderMock = $this->getMock('\\Dexter\\Http\\Header');
        $headerSenderMock->expects($this->once())
            ->method('send')
            ->with($this->equalTo(array('HTTP/1.0 404 Not Found')));

        $response->setHeaderSender($headerSenderMock)
                 ->addHeader('404 Not Found')
                 ->send();
    }

    public function testShouldGetSetHeaderSender()
    {
        $response = new \Dexter\Router\Response();
        $headerSenderMock = $this->getMock('\\Dexter\\Http\\Header');

        $this->assertSame($response, $response->setHeaderSender($headerSenderMock));
        $this->assertSame($headerSenderMock, $response->getHeaderSender());
    }

    public function testShouldGetDefaultHeaderSender()
    {
        $response = new \Dexter\Router\Response();
        $this->assertInstanceOf(
            '\\Dexter\\Http\\Header',
            $response->getHeaderSender()
        );
    }
}
