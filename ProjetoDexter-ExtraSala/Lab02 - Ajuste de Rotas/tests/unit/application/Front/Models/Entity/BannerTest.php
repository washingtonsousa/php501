<?php

namespace DexterApp\Front\Models\Entity;

use DexterApp\Front\Models\TestProvider;

class BannerTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $banner = new Banner();
        $this->assertSame($banner, $banner->setId($int));
        $this->assertSame($int, $banner->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID tem que ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $banner = new Banner();
        $banner->setId($notAnInt);
    }

    /**
     * @dataProvider providerForImagens
     */
    public function testShouldGetSetImagem($imagem)
    {
        $banner = new Banner();
        $this->assertSame($banner, $banner->setImagem($imagem));
        $this->assertSame($imagem, $banner->getImagem());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage IMAGEM deve ter extensão: jpg, jpeg, png ou gif
     */
    public function testShouldNotGetSetImagem($notAnImagem)
    {
        $banner = new Banner();
        $banner->setImagem($notAnImagem);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetTitulo($string)
    {
        $banner = new Banner();
        $this->assertSame($banner, $banner->setTitulo($string));
        $this->assertSame($string, $banner->getTitulo());
    }

    /**
     * @dataProvider providerForBigString50
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage TITULO tem que ter no máximo 50 caracteres
     */
    public function testShouldNotGetSetTitulo($bigString)
    {
        $banner = new Banner();
        $banner->setTitulo($bigString);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetDescricao($string)
    {
        $banner = new Banner();
        $this->assertSame($banner, $banner->setDescricao($string));
        $this->assertSame($string, $banner->getDescricao());
    }
}
