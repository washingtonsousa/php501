<?php

namespace DexterApp\Front\Models\Entity;

use DexterApp\Front\Models\TestProvider;

class VantagemTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $vantagem = new Vantagem();
        $this->assertSame($vantagem, $vantagem->setId($int));
        $this->assertSame($int, $vantagem->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID tem que ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $vantagem = new Vantagem();
        $vantagem->setId($notAnInt);
    }

    /**
     * @dataProvider providerForImagens
     */
    public function testShouldGetSetImagem($imagem)
    {
        $vantagem = new Vantagem();
        $this->assertSame($vantagem, $vantagem->setImagem($imagem));
        $this->assertSame($imagem, $vantagem->getImagem());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage IMAGEM deve ter extensão: jpg, jpeg, png ou gif
     */
    public function testShouldNotGetSetImagem($notAnImagem)
    {
        $vantagem = new Vantagem();
        $vantagem->setImagem($notAnImagem);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetTitulo($string)
    {
        $vantagem = new Vantagem();
        $this->assertSame($vantagem, $vantagem->setTitulo($string));
        $this->assertSame($string, $vantagem->getTitulo());
    }

    /**
     * @dataProvider providerForBigString50
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage TITULO tem que ter no máximo 50 caracteres
     */
    public function testShouldNotGetSetTitulo($bigString)
    {
        $vantagem = new Vantagem();
        $vantagem->setTitulo($bigString);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetDescricao($string)
    {
        $vantagem = new Vantagem();
        $this->assertSame($vantagem, $vantagem->setDescricao($string));
        $this->assertSame($string, $vantagem->getDescricao());
    }

    /**
     * @dataProvider providerYN
     */
    public function testShouldGetSetShowHome($showHome, $booleanValue)
    {
        $vantagem = new Vantagem();
        $this->assertSame($vantagem, $vantagem->setShowHome($showHome));
        $this->assertSame($booleanValue, $vantagem->getShowHome());
    }
}
