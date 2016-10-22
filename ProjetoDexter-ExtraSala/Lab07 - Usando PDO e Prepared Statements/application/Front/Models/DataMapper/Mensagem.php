<?php

namespace DexterApp\Front\Models\DataMapper;

use DexterApp\Front\Models\AbstractMapper;
use DexterApp\Front\Models\Entity;

class Mensagem extends AbstractMapper
{

    /**
     * Insere uma mensagem
     */
    public function insert(Entity\Mensagem $mensagem)
    {
        return $this->getDb()->insert(
            'INSERT INTO mensagem (nome, email, assunto, mensagem) VALUES(?, ?, ?, ?)',
            array(
                $mensagem->getNome(),
                $mensagem->getEmail(),
                $mensagem->getAssunto(),
                $mensagem->getMensagem()
            )
        );
    }
}
