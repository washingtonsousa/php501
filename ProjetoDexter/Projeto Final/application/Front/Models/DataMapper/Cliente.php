<?php

namespace DexterApp\Front\Models\DataMapper;

use DexterApp\Front\Models\AbstractMapper;
use DexterApp\Front\Models\Entity;

class Cliente extends AbstractMapper
{

    /**
     * Insere um novo cliente
     */
    public function insert(Entity\Cliente $cliente)
    {
        return $this->getDb()->insert(
            'INSERT INTO cliente (nome, cpf_cnpj, telefone, celular, email, cep, estado, bairro, endereco, cidade)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            array(
                $cliente->getNome(),
                $cliente->getCpfCnpj(),
                $cliente->getTelefone(),
                $cliente->getCelular(),
                $cliente->getEmail(),
                $cliente->getCep(),
                $cliente->getEstado(),
                $cliente->getBairro(),
                $cliente->getEndereco(),
                $cliente->getCidade()
            )
        );
    }
}
