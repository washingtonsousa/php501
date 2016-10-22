<?php

namespace DexterTests\View;

class ContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldAssertInstanceOfArrayObject()
    {
        $this->assertInstanceOf('\\ArrayObject', new \Dexter\View\Container());
    }
}
