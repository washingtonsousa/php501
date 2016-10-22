<?php

interface ContasInterface
{

    public function sacar($valor);

    public function depositar($valor);

    public function verSaldo();
}

interface LogInterface
{
    public function gerarLog($dado);
}

abstract class ContasAbstract implements ContasInterface, LogInterface
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
    
    public function gerarLog($dado)
    {
        
    }
}

final class ContaCorrente extends ContasAbstract
{
}

final class ContaPoupanca extends ContasAbstract
{
}