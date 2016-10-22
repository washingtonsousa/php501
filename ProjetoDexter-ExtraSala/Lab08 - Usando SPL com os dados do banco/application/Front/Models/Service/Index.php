<?php

namespace DexterApp\Front\Models\Service;

use DexterApp\Front\Models\Collection;
use DexterApp\Front\Models\Entity;
use DexterApp\Front\Models\DataMapper;

/**
 * Model Façade para Controller da página inicial
 */
class Index
{

    private $bannerMapper;
    private $vantagemMapper;
    private $funcionalidadeMapper;

    public function getBannerMapper()
    {
        if (!$this->bannerMapper) {
            $this->bannerMapper = new DataMapper\Banner();
        }
        return $this->bannerMapper;
    }

    public function setBannerMapper(DataMapper\Banner $bannerMapper)
    {
        $this->bannerMapper = $bannerMapper;
        return $this;
    }

    public function getVantagemMapper()
    {
        if (!$this->vantagemMapper) {
            $this->vantagemMapper = new DataMapper\Vantagem();
        }
        return $this->vantagemMapper;
    }

    public function setVantagemMapper(DataMapper\Vantagem $vantagemMapper)
    {
        $this->vantagemMapper = $vantagemMapper;
        return $this;
    }

    public function getFuncionalidadeMapper()
    {
        if (!$this->funcionalidadeMapper) {
            $this->funcionalidadeMapper = new DataMapper\Funcionalidade();
        }
        return $this->funcionalidadeMapper;
    }

    public function setFuncionalidadeMapper(DataMapper\Funcionalidade $funcionalidadeMapper)
    {
        $this->funcionalidadeMapper = $funcionalidadeMapper;
        return $this;
    }

    /**
     * Pega os banners da página inicial
     */
    public function getBanners()
    {
        $banners = new Collection\Banner();
        $bannerList = $this->getBannerMapper()->fetchAll();

        foreach ($bannerList as $banner) {
            $banners[] = (new Entity\Banner())
                ->setId((int)$banner->id)
                ->setImagem($banner->imagem)
                ->setTitulo($banner->titulo)
                ->setDescricao($banner->descricao);
        }

        return $banners;
    }

    /**
     * Pega as vantagens da página inicial
     */
    public function getVantagens()
    {
        $vantagens = new \ArrayObject();
        $vantagemList = $this->getVantagemMapper()->fetchAll();

        foreach ($vantagemList as $vantagem) {
            $vantagens[] = (new Entity\Vantagem())
                ->setId((int)$vantagem->id)
                ->setImagem($vantagem->imagem)
                ->setTitulo($vantagem->titulo)
                ->setDescricao($vantagem->descricao)
                ->setShowHome($vantagem->show_home);
        }

        // FilterIterator para mostrar somente vantagens que são da HOME_PAGE
        // [Lab08] Usando SPL com os dados do banco
    }


    /**
     * Pega as funcionalidades da página inicial
     */
    public function getFuncionalidades()
    {
        $funcionalidades = new Collection\Funcionalidade();
        $funcionalidadeList = $this->getFuncionalidadeMapper()->fetchAll();

        foreach ($funcionalidadeList as $funcionalidade) {
            // usando o construtor de AbstractEntity aqui como exemplo
            $funcionalidades[] = new Entity\Funcionalidade(array(
                'id'        => (int) $funcionalidade->id,
                'imagem'    => $funcionalidade->imagem,
                'titulo'    => $funcionalidade->titulo,
                'descricao' => $funcionalidade->descricao
            ));
        }

        return $funcionalidades;
    }
}
