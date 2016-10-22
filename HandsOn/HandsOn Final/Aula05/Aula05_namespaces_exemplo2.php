<?php

namespace Bradesco;

class Contas
{
    protected $saldo = 500;
    protected $banco = 'Bradesco';
    
    public function verSaldo()
    {
        return $this->saldo;
    }
    
    public function getBanco()
    {
        return $this->banco;
    }
}

namespace Itau;

use Bradesco\Contas as ContaBradesco;
use Bradesco\Bradesco;

class Contas
{
    protected $saldo = 500;
    protected $banco = 'Itau';
    
    public function verSaldo()
    {
        return $this->saldo;
    }
    
    public function getBanco()
    {
        return $this->banco;
    }  
}


$contaBradesco = new ContaBradesco();

echo 'Nome do Banco: ' . $contaBradesco->getBanco();
$contaItau    = new Contas();
echo '<hr>';
echo 'Nome do Banco: ' . $contaItau->getBanco();