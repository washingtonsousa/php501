<?php

trait Operacoes
{

    public function depositar($valor)
    {
        echo '<hr>Metodo da Classe: Trait <hr>';
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

    protected $saldo;

    public function depositar($valor)
    {
        echo '<hr>Metodo da Classe: Contas <hr>';
    }
}

class ContaPoupanca extends Contas
{
    use Operacoes;
    
    public function depositar($valor)
    {
        echo '<hr>Metodo da Classe: Poupanca <hr>';
        $this->saldo += $valor;
    }
}

class ContaCorrente extends Contas
{
    use Operacoes;
    
    public function depositar($valor)
    {
        echo '<hr>Metodo da Classe: Corrente <hr>';
        $this->saldo += $valor;
    }
}

$objPoupanca = new ContaPoupanca();
$objCorrente = new ContaCorrente();

$objCorrente->depositar(500);
$objPoupanca->depositar(800);

echo '<pre>';
var_dump($objCorrente);
echo '<hr>';
var_dump($objPoupanca);
