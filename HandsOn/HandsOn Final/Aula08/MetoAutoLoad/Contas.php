<?php

class Contas
{
    public $saldo = 500;
    public $titular;
    
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
    }
}