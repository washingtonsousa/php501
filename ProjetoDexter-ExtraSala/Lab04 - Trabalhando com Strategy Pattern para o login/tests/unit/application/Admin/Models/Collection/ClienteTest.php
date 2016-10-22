<?php

namespace DexterApp\Admin\Models\Collection;

class ClienteTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeInstanceOfArrayObject()
    {
        $this->assertInstanceOf('\\ArrayObject', new \DexterApp\Admin\Models\Collection\Cliente());
    }
}
