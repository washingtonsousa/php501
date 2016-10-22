<?php

interface ContasInterface
{

    public function sacar($valor);

    public function depositar($valor);

    public function verSaldo();
}

abstract class ContasAbstract implements ContasInterface
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

final class ContaCorrente extends ContasAbstract
{
}

final class ContaPoupanca extends ContasAbstract
{
}