<?php

namespace DexterApp\Front\Models\Service;

class IndexTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetBannerMapper()
    {
        $model = new Index();
        $bannerMapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Banner');

        $this->assertSame($model, $model->setBannerMapper($bannerMapper));
        $this->assertSame($bannerMapper, $model->getBannerMapper());
    }

    public function testShouldGetDefaultBannerMapper()
    {
        $model = new Index();
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\DataMapper\\Banner',
            $model->getBannerMapper()
        );
    }

    public function testShouldGetSetVantagemMapper()
    {
        $model = new Index();
        $vantagemMapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Vantagem');

        $this->assertSame($model, $model->setVantagemMapper($vantagemMapper));
        $this->assertSame($vantagemMapper, $model->getVantagemMapper());
    }

    public function testShouldgetDefaultVantagemMapper()
    {
        $model = new Index();
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\DataMapper\\Vantagem',
            $model->getVantagemMapper()
        );
    }

    public function testShouldGetSetFuncionalidadeMapper()
    {
        $model = new Index();
        $funcionalidadeMapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Funcionalidade');

        $this->assertSame($model, $model->setFuncionalidadeMapper($funcionalidadeMapper));
        $this->assertSame($funcionalidadeMapper, $model->getFuncionalidadeMapper());
    }

    public function testShouldGetDefaultFuncionalidadeMapper()
    {
        $model = new Index();
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\DataMapper\\Funcionalidade',
            $model->getFuncionalidadeMapper()
        );
    }

    public function testShouldGetBanners()
    {
        $model = new Index();
        $bannerMapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Banner');

        $bannerList = array(
            (object) array(
                'id' => 1,
                'imagem' => 'imagem.jpg',
                'titulo' => 'titulo',
                'descricao' => 'descricao'
            )
        );

        $bannerMapper->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue($bannerList));

        $model->setBannerMapper($bannerMapper);

        $banners = $model->getBanners();

        $this->assertCount(1, $banners);
        $this->assertSame(1, $banners[0]->getId());
    }

    public function testShouldGetVantagens()
    {
        $model = new Index();
        $vantagemMapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Vantagem');

        $vantagemList = array(
            (object) array(
                'id' => 1,
                'titulo' => 'titulo',
                'descricao' => 'descricao',
                'imagem' => 'imagem.jpg',
                'show_home' => 'N'
            ),
            (object) array(
                'id' => 2,
                'titulo' => 'titulo',
                'descricao' => 'descricao',
                'imagem' => 'imagem.jpg',
                'show_home' => 'Y'
            )
        );

        $vantagemMapper->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue($vantagemList));

        $model->setVantagemMapper($vantagemMapper);

        $vantagens = $model->getVantagens();

        foreach ($vantagens as $vantagem) {
            $this->assertSame(2, $vantagem->getId());
        }
    }

    public function testShouldGetFuncionalidades()
    {
        $model = new Index();
        $funcionalidadeMapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Funcionalidade');

        $funcionalidadeList = array(
            (object) array(
                'id' => 1,
                'titulo' => 'titulo',
                'descricao' => 'descricao',
                'imagem' => 'imagem.jpg'
            )
        );

        $funcionalidadeMapper->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue($funcionalidadeList));

        $model->setFuncionalidadeMapper($funcionalidadeMapper);

        $funcionalidades = $model->getFuncionalidades();

        $this->assertCount(1, $funcionalidades);
        $this->assertSame(1, $funcionalidades[0]->getId());
    }
}
