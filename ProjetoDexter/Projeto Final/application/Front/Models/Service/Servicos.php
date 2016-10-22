<?php

namespace DexterApp\Front\Models\Service;

use DexterApp\Front\Models\Collection;
use DexterApp\Front\Models\Entity;
use DexterApp\Front\Models\DataMapper;

/**
 * Model Façade para página de serviços
 */
class Servicos
{

    private $vantagemMapper;

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

    /**
     * Pega os serviços
     */
    public function getServicos()
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

        // FilterIterator para mostrar somente vantagens que são da página de serviços
        return new Collection\Vantagem($vantagens->getIterator(), false);
    }
}
