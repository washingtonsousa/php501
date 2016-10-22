<?php

namespace DexterTests\Session;

class SegmentTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetIssetAndUnsetFromSession()
    {
        $managerMock = $this->getMockBuilder('\\Dexter\\Session\\Manager')
            ->disableOriginalConstructor()
            ->getMock();

        $started = false;
        $managerMock->expects($this->atLeastOnce())
            ->method('hasStarted')
            ->will($this->returnCallback(function () use (&$started) {
                if ($started === false) {
                    $started = true;
                    return false;
                }
                return true;
            }));
        $managerMock->expects($this->once())
            ->method('start');

        $_SESSION = array();

        $segment = new \Dexter\Session\Segment($managerMock, 'test');
        $segment->a = 1;
        $this->assertSame(1, $_SESSION['test']['a']);
        $this->assertSame(1, $segment->a);

        $this->assertTrue(isset($segment->a));
        unset($segment->a);
        $this->assertFalse(isset($segment->a));
        $this->assertFalse(isset($_SESSION['test']['a']));

        $segment->clear();
        $this->assertSame(array(), $_SESSION['test']);
    }
}
