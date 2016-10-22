<?php

namespace DexterTests\Session;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetInstance()
    {
        $this->assertInstanceOf(
            '\\Dexter\\Session\\Manager',
            \Dexter\Session\Manager::getInstance()
        );
    }

    public function testShouldSayFalseForStarted()
    {
        $manager = \Dexter\Session\Manager::getInstance();
        $this->assertFalse($manager->hasStarted());
    }
}
