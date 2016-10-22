<?php

abstract class Contas
{

    protected  $titular;

    protected  $saldo;

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function sacar($valor)
    {
        $this->saldo -= $valor;
    }
    
    public function setTitular($titular)
    {
        $this->titular = $titular;
    }
    
    public function getTitular()
    {
        return $titular;
    }
    
    protected function metodoProtegido()
    {
        echo '<hr>Acessando um método protegido<hr>';
    }
}

class ContaPoupanca extends Contas
{
    public function aplicar($valor)
    {
        $this->metodoProtegido();
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
$objPoupanca->sacar(3000);

echo 'Saldo Atual: ' . $objPoupanca->verSaldo();
echo '<hr>';
$objPoupanca->aplicar(4000);
echo 'Saldo Atual: ' . $objPoupanca->verSaldo();
echo '<hr>';
$objPoupanca->metodoProtegido();
