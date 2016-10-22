<?php

namespace DexterApp\Front\Models\Collection;

use DexterApp\Front\Models\Entity;

class VantagemTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldFilterCollection()
    {
        $vantagem1 = new Entity\Vantagem(array('id' => 1, 'show_home' => 'Y'));
        $vantagem2 = new Entity\Vantagem(array('id' => 2, 'show_home' => 'N'));
        $vantagens = new \ArrayObject(array($vantagem1, $vantagem2));
        $collection1 = new Vantagem($vantagens->getIterator(), true);
        $collection2 = new Vantagem($vantagens->getIterator(), false);

        foreach ($collection1 as $vantagem) {
            $this->assertSame(1, $vantagem->getId());
        }
        foreach ($collection2 as $vantagem) {
            $this->assertSame(2, $vantagem->getId());
        }
    }
}
