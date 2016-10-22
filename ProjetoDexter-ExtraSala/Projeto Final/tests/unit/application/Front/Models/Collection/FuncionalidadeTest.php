<?php

namespace DexterApp\Front\Models\Collection;

class FuncionalidadeTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldExtendsFromArrayObject()
    {
        $collection = new Funcionalidade();
        $this->assertInstanceOf('\\ArrayObject', $collection);
    }
}
