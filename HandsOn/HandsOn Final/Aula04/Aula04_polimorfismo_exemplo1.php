<?php

interface ContasInterface
{

    public function sacar($valor);

    public function depositar($valor);

    public function verSaldo();
}

class ContaCorrente implements ContasInterface
{

    public $saldo = 0;

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

class ContaPoupanca implements ContasInterface
{

    public $saldo = 0;

    public function sacar($valor)
    {
        echo "<hr> Saque Efetuado: $valor <hr>";
        $this->saldo -= $valor;
    }

    public function depositar($valor)
    {
        echo "<hr> Deposito Efetuado: $valor <hr>";
        $this->saldo += $valor;
    }

    public function verSaldo()
    {
        return $this->saldo;
    }
}

class ContaSemIterface
{
}

class Aplicacao
{

    public function aplicar(ContasInterface $conta)
    {
        echo 'Ver Saldo: ' . $conta->verSaldo();
    }
}

$contaCorrente = new ContaCorrente();
$contaCorrente->depositar(500);
$contaPoupanca = new ContaPoupanca();
$contaPoupanca->depositar(800);
$contaSemInterface = new ContaSemIterface();

$aplicacao = new Aplicacao();
$aplicacao->aplicar($contaPoupanca);

echo '<hr>';

echo 'É uma instancia de ContasSemInterface: <br>';
var_dump($contaPoupanca instanceof ContaSemIterface);
echo '<br>';
echo 'É uma instancia de ContaPoupanca: <br>';
var_dump($contaPoupanca instanceof  ContaPoupanca);
echo '<br>';
echo 'É uma instancia de ContasInterface: <br>';
var_dump($contaPoupanca instanceof ContasInterface);
echo '<hr>';
echo 'É uma instancia de ContasSemInterface: <br>';
var_dump($contaCorrente instanceof ContaSemIterface);
echo '<br>';
echo 'É uma instancia de ContaCorrente: <br>';
var_dump($contaCorrente instanceof  ContaCorrente);
echo '<br>';
echo 'É uma instancia de ContasInterface: <br>';
var_dump($contaCorrente instanceof ContasInterface);


