<?php

abstract class Contas
{

    public $titular;

    public $saldo;

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function sacar($valor)
    {
        $this->saldo -= $valor;
    }
}

class ContaPoupanca extends Contas
{
    public function aplicar($valor)
    {
        $this->depositar($valor);
    }
    
    public function resgatar($valor)
    {
        $this->sacar($valor);
    }
    
    public function verSaldo()
    {
        return $this->saldo;
    }
}

$objPoupanca = new ContaPoupanca();
$objPoupanca->depositar(5000);
$objPoupanca->saldo = 3000;
echo 'Saldo Atual: ' . $objPoupanca->saldo;
echo '<hr>';
$objPoupanca->aplicar(4000);
echo 'Saldo Atual: ' . $objPoupanca->verSaldo();
