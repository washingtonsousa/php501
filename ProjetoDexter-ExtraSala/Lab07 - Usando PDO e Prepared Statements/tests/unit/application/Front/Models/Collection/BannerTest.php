<?php

namespace DexterApp\Front\Models\Collection;

class BannerTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldExtendsFromArrayObject()
    {
        $collection = new Banner();
        $this->assertInstanceOf('\\ArrayObject', $collection);
    }
}
