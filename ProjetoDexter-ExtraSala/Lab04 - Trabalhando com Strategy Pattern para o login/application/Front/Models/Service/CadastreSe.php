<?php

namespace DexterApp\Front\Models\Service;

use DexterApp\Front\Models\DataMapper;
use DexterApp\Front\Models\Entity;

class CadastreSe
{

    private $clienteMapper;

    public function getClienteMapper()
    {
        if (!$this->clienteMapper) {
            $this->clienteMapper = new DataMapper\Cliente();
        }
        return $this->clienteMapper;
    }

    public function setClienteMapper(DataMapper\Cliente $clienteMapper)
    {
        $this->clienteMapper = $clienteMapper;
        return $this;
    }

    public function save(array $dados)
    {
        $dados['cpf_cnpj'] = $dados['cpf'] ?: $dados['cnpj'];

        $cliente = new Entity\Cliente($dados);
        return $this->getClienteMapper()->insert($cliente);
    }

    public function getEstados()
    {
        $estados = array(
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MT',
            'MS',
            'MG',
            'PA',
            'PB',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RS',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO'
        );
        sort($estados);
        return $estados;
    }
}
