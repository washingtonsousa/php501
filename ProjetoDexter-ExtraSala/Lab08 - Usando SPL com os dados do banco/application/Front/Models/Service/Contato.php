<?php

namespace DexterApp\Front\Models\Service;

use DexterApp\Front\Models\DataMapper;
use DexterApp\Front\Models\Entity;

class Contato
{
    
    private $mensagemMapper;

    public function getMensagemMapper()
    {
        if (!$this->mensagemMapper) {
            $this->mensagemMapper = new DataMapper\Mensagem();
        }
        return $this->mensagemMapper;
    }

    public function setMensagemMapper(DataMapper\Mensagem $mapper)
    {
        $this->mensagemMapper = $mapper;
        return $this;
    }

    public function save(array $dados)
    {
        return $this->getMensagemMapper()->insert(new Entity\Mensagem($dados));
    }
}
