<?php

interface FretesInterface
{

    public function buscar($dados);

    public function getValorFrete();
}

class FretesAbstract implements FretesInterface
{
    public $valor;
    public $prazo;
    
    public function buscar($dados)
    {
        echo '<hr>Consultado a API dos Correios...<hr>';
        $this->valor = 50;
        $this->prazo = 20;
    }
    
    public function getValorFrete()
    {
        return $this->valor;
    }
    
    public function getPrazo()
    {
        return $this->prazo;
    }
}

class FretePac extends FretesAbstract
{
    public $tipo = 'PAC';
}

class FreteSedex extends FretesAbstract
{
    public $tipo = 'SEDEX';
}

class FreteSedex10 extends FretesAbstract
{
    public $tipo = 'SEDEX10';
}