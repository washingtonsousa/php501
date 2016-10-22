<?php

class TableGateway
{

    protected $tabela;

    public function __construct($tabela)
    {
        $this->tabela = $tabela;
    }

    public function inserir(array $dados)
    {
        // Logica para montar o insert
    }

    public function alterar(array $dados, $id)
    {
        // Logica para montar o update
    }

    public function listar($campos = '*', $where = null, $ordem = null)
    {
        //Logica para listar todos os registros
    }
    
    public function buscarRegistro($where, $campos = '*')
    {
        //Lógica para retornar um registro
    }
}