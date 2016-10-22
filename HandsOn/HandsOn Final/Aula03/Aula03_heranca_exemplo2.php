<?php

class Contas
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

class ContaCorrente extends Contas
{
    public function sacar($valor)
    {
        echo "<hr> Saque efetuado <b> valor: $valor </b> <hr>";
        //O parent faz referencia a classe Pai
        parent::sacar($valor);
    }
}

$conta = new Contas();
$conta->depositar(2500);
$conta->sacar(200);
echo '<hr>';
$contaCorrente = new ContaCorrente();
$contaCorrente->depositar(2500);
$contaCorrente->sacar(800);
echo '<hr>';
echo 'Saldo em Conta: ' . $conta->verSaldo();
echo '<br>';
echo 'Saldo em Conta Corrente: ' . $contaCorrente->verSaldo();