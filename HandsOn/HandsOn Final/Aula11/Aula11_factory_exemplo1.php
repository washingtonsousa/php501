<?php

//Código com problema sem uso da Factory

class Titular
{
    public $nome;
    public $cpf;
    public $celular;
    
    public function __construct($nome, $cpf, $celular)
    {
        $this->nome = $nome;
        $this->cpf  = $cpf;
        $this->celular = $celular;
    }
}

class Contas
{
    protected $titular;
    protected $saldo = 0;
    
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
    }
    
    public function getTitular()
    {
        return $this->titular;
    }
}

Class Teste
{
    public $titular;
    public $teste;
    
    public function consultar(Titular $titular)
    {
        $this->titular = $titular;
    }
}

$titular = new Titular('Aline dos Santos', '292.508.638-87', '96203-8877');
$titularTeste = new Titular('Amanda Silva', '292.508.638-88', '96203-8878');

$contas = new Contas($titular);
$teste   = new Teste();
$teste->consultar($titularTeste);

echo 'Titular em Contas: ' . $contas->getTitular()->nome;
echo '<br>Titular em Teste: ' . $teste->titular->nome;