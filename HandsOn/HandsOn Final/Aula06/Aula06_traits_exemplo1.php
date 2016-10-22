<?php

trait Operacoes
{

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function sacar($valor)
    {
        $this->saldo -= $valor;
    }

    public function verSaldo()
    {
        return $this->saldo;
    }
}

abstract class Contas
{
    use Operacoes;

    protected $saldo;
}

class ContaPoupanca extends Contas
{}

class ContaCorrente extends Contas
{}


$objPoupanca = new ContaPoupanca();
$objCorrente = new ContaCorrente();

$objCorrente->depositar(500);
$objPoupanca->depositar(800);

echo '<pre>';
var_dump($objCorrente);
echo '<hr>';
var_dump($objPoupanca);
