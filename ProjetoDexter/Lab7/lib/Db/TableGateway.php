<?php

namespace lib\Db;

class TableGateway
{
    private $conexao;
    private $tabela;

    public function __construct(Conexao $conexao, $tabela)
    {
        $this->conexao = $conexao;
        $this->tabela = $tabela;
    }

    public function buscarRegistro(array $where, array $campos = array())
    {
        $campos = empty($campos) ? '*' : implode(',', $campos);
        $select = "SELECT $campos FROM $this->tabela";

        $chaves = array_keys($where);
        if ($chaves) {
            foreach ($chaves as $chave) {
                $arrayChaves[] = " $chave = ?";
            }
            $select .= ' WHERE' . implode(' AND ', $arrayChaves);
        }

        $conn = $this->conexao->get();
        $pdoSt = $conn->prepare($select);
        $pdoSt->execute(array_values($where));

        return $pdoSt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar(array $where = array(), $campos = array(), $ordem = null)
    {
        $campos = empty($campos) ? '*' : implode(',', $campos);
        $select = "SELECT $campos FROM $this->tabela";

        $chaves = array_keys($where);
        if ($chaves) {
            foreach ($chaves as $chave) {
                $arrayChaves[] = " $chave = ?";
            }
            $select .= ' WHERE' . implode(' AND ', $arrayChaves);
        }

        if ($ordem) {
            $select .= " ORDER BY $ordem";
        }

        $conn = $this->conexao->get();
        $pdoSt = $conn->prepare($select);
        $pdoSt->execute(array_values($where));

        return $pdoSt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir(array $dados)
    {
        foreach ($dados as $campo => $valor) {
            $campos[] = $campo;
            $holders[] = '?';
        }

        $campos = implode(',', $campos);
        $holders = implode(',', $holders);

        $insert = "INSERT INTO {$this->tabela}($campos)VALUES($holders)";

        $conn = $this->conexao->get();
        $pdoSt = $conn->prepare($insert);

        return $pdoSt->execute(array_values($dados));
    }

    public function alterar($id, array $dados)
    {
        foreach ($dados as $campo => $valor) {
            $sets[] = "$campo=?";
        }

        $sets = implode(',', $sets);

        $update = "UPDATE {$this->tabela} SET $sets WHERE id = ?";
        
      
        $conn = $this->conexao->get();
        $pdoSt = $conn->prepare($update);

        $parametros = array_values($dados);
        array_push($parametros, $id);       

        return $pdoSt->execute($parametros);
    }

    public function excluir($id)
    {
        $delete = "DELETE FROM $this->tabela WHERE id = ?";

        $conn = $this->conexao->get();
        $pdoSt = $conn->prepare($delete);

        return $pdoSt->execute(array($id));
    }
}