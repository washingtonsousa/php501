<?php

namespace Entities;

class ClientesEntity
{
    protected  $nome = 'Luciana Clientes dos Santos';
    
    public function getNome()
    {
        return $this->nome;
    }
}