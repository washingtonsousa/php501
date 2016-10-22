<?php

namespace DexterApp\Admin\Models\Exceptions;

class InvalidUserOrPasswordExceptionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \DexterApp\Admin\Models\Exceptions\InvalidUserOrPasswordException
     * @expectedExceptionMessage teste
     */
    public function testShouldThrowAnException()
    {
        throw new \DexterApp\Admin\Models\Exceptions\InvalidUserOrPasswordException('teste');
    }
}
