<?php

abstract class Contas
{

    public $saldo = 0;

    public $titular;
    

    public function sacar($valor)
    {
        $this->saldo -= $valor;
    }

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function verSaldo()
    {
        return $this->saldo;
    }
}

class ContaPoupanca extends Contas
{
}

class ContaCorrente extends Contas
{
}

$contaPoupanca = new ContaPoupanca();
$contaCorrente = new ContaCorrente();


echo '<pre>';
var_dump($contaCorrente);
echo '<hr>';
var_dump($contaPoupanca);
echo '<hr>';