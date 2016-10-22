<?php

namespace DexterApp\Front\Models\DataMapper;

use DexterApp\Front\Models\AbstractMapper;

class Banner extends AbstractMapper
{

    /**
     * Seleciona todos os banners
     */
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM banner');
    }
}
