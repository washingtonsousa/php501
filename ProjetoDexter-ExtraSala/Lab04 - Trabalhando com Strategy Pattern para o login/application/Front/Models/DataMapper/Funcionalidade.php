<?php

namespace DexterApp\Front\Models\DataMapper;

use DexterApp\Front\Models\AbstractMapper;

class Funcionalidade extends AbstractMapper
{

    /**
     * Seleciona todos as funcionalidades
     */
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM funcionalidade');
    }
}
