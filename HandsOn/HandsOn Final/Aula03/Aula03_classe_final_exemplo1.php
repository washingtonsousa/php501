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

    /**
     * Um método abstrato deve ser obrigatoriamente implementado na classe filha
     *
     * @param string $dados            
     */
    public abstract function gerarLog($dados);
}

final class ContaPoupanca extends Contas
{

    public function gerarLog($dados)
    {
        echo "<hr>Gerando Log..... Conta Poupança<hr>";
    }
}

final class ContaCorrente extends Contas
{

    public function gerarLog($dados)
    {
        echo "<hr>Gerando Log..... Conta Corrente<hr>";
    }
}

class ContaConjunta extends Contas
{

    public function gerarLog($dados)
    {
        echo "<hr>Gerando Log..... Conta Corrente<hr>";
    }
}

class ContaNova extends Contas
{

    public function gerarLog($dados)
    {
        echo "<hr>Gerando Log..... Conta Corrente<hr>";
    }
}

$contaPoupanca = new ContaPoupanca();
$contaCorrente = new ContaCorrente();

echo '<pre>';
var_dump($contaCorrente);
echo '<hr>';
var_dump($contaPoupanca);
echo '<hr>';