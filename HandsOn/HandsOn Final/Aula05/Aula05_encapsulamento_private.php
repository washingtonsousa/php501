<?php

abstract class Contas
{

    protected $titular;

    protected $saldo;
    
    private $atributoPrivate;

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

    private $aniversario = 6;
    private $nomeClasse  = __CLASS__;

    protected function rendimento()
    {
        if ($this->aniversario = 6) {
            echo '<hr>Aniversario da conta<hr>';
            echo '<hr>Nome da Classe: ' . $this->nomeClasse . '<hr>';
        }
    }

    public function aplicar($valor)
    {
        $this->rendimento();
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

