<?php

namespace Lib\Db;

class TableGateway
{

    protected $tabela;

    private $conn;

    public function __construct($tabela)
    {
        $this->tabela = $tabela;
        $this->conn = BancoFactory::criar();
    }

    public function inserir(array $dados)
    {
        // Logica para montar o insert
        foreach ($dados as $campo => $valor) {
            $campos[] = $campo;
            $valores[] = "'$valor'";
        }
        
        $campos = implode(',', $campos);
        $valores = implode(',', $valores);
        
        $insert = "INSERT INTO {$this->tabela}($campos)VALUES($valores)";
        
        return $this->conn->query($insert);
    }

    public function alterar(array $dados, $id)
    {
        // Logica para montar o update
        foreach ($dados as $campo => $valor) {
            $sets[] = "$campo='$valor'";
        }
        
        $sets = implode(',', $sets);
        
        $update = "UPDATE {$this->tabela} SET $sets WHERE id = $id";
        
        return $this->conn->query($update);
    }

    public function listar($campos = '*', $where = null, $ordem = null)
    {
        // Logica para listar todos os registros
        $select = "SELECT $campos FROM $this->tabela";
        
        if ($where) {
            $select .= " $where";
        }
        
        if ($ordem) {
            $select .= " ORDER BY $ordem";
        }
        
        $pdoSt = $this->conn->query($select);
        
        return $pdoSt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarRegistro($where, $campos = '*')
    {
        // Lógica para retornar um registro
        $select = "SELECT $campos FROM $this->tabela WHERE $where";
        
        $pdoSt = $this->conn->query($select);
        
        return $pdoSt->fetch(\PDO::FETCH_ASSOC);
    }

    public function excluir($where)
    {
        $delete = "DELETE FROM $this->tabela WHERE $where";
        
        return $this->conn->query($delete);
    }
}