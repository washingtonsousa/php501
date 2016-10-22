<?php

class Banco
{

    protected $conn;

    public function getConn()
    {
        if (! isset($conn)) {
            $this->conn = new PDO('pgsql:host=localhost;dbname=aula_pdo', 'pdo', '123456');
        }
        
        return $this->conn;
    }
}

class Clientes
{

    protected $banco;

    public function __construct(Banco $banco = null)
    {
        $this->banco = $banco;
    }

    public function getBanco()
    {
        if (! isset($this->banco)) {
            $this->banco = new Banco();
        }
        
        return $this->banco;
    }
}

$banco = new Banco();
$conexao = $banco->getConn();
$conexao2 = $banco->getConn();

var_dump($conexao);
var_dump($conexao2);

echo '<hr>';
$clientes = new Clientes();
var_dump($clientes->getBanco()->getConn());