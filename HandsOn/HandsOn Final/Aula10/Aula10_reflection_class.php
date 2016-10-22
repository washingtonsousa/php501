<?php

class Contas
{
    protected $saldo = 0;
    
    public function depositar($valor)
    {
        $this->saldo += $valor;
    }
    
    public function sacar($valor)
    {
        $this->saldo -= $valor;
    }
}

$reflection = new ReflectionClass('Contas');

echo '<pre>';
print_r($reflection->getMethods());
echo '<hr>';
print_r($reflection->getProperties());

echo '<h1>Reflection PDO </h1>';
$reflectionPdo = new ReflectionClass('PDO');
echo '<pre>';
print_r($reflectionPdo->getMethods());
echo '<hr>';
print_r($reflectionPdo->getProperties());
echo '<hr>';
var_dump($reflectionPdo->getDocComment());
