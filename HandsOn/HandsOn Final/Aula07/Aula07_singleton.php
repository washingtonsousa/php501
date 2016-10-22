<?php

class Banco
{

    public static $objetos;

    public function conectar()
    {
        echo '<hr>Conectando ao banco<hr>';
        self::$objetos ++;
    }
}

class BancoSingleton
{

    public static $objetos;

    public static $conexao;

    public static function getConexao()
    {
        if (! self::$conexao) {
            self::$conexao = new self();
            
            echo '<hr>Conectando ao banco<hr>';
            self::$objetos ++;
        }
        
        return self::$conexao;
    }
}

$banco = new Banco();
$banco->conectar();

$banco2 = new Banco();
$banco2->conectar();

$banco3 = new Banco();
$banco3->conectar();

echo 'Total Objetos: ' . Banco::$objetos;

echo '<hr>';

$banco = BancoSingleton::getConexao();

$banco2 = BancoSingleton::getConexao();

$banco3 = BancoSingleton::getConexao();

$banco4 = new BancoSingleton();

echo 'Total Objetos: ' . BancoSingleton::$objetos;

var_dump($banco);
echo '<br>';
var_dump($banco2);
echo '<br>';
var_dump($banco3);
echo '<br>';
var_dump($banco4);