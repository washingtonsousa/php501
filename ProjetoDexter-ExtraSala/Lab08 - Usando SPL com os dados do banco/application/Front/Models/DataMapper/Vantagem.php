<?php

namespace DexterApp\Front\Models\DataMapper;

use DexterApp\Front\Models\AbstractMapper;

class Vantagem extends AbstractMapper
{

    /**
     * Seleciona todos as vantagens
     */
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM vantagem');
    }
}
