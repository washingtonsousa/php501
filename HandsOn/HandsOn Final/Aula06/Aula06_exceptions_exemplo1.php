<?php

class Contas
{
    protected $saldo = 0;
    
    public function sacar($valor)
    {
        if($this->saldo < $valor)
        {
            throw new Exception('Saldo Insuficiente', 1);
        }
        
        $this->saldo -= $valor;
        echo "<hr> Saque Efetuado: $valor <hr>";
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

try{
    $conta = new Contas();
    $conta->sacar(500);
}catch (Exception $erro){
    echo '<hr>Erro:<b>' . $erro->getCode() . '-' . $erro->getMessage() . '</b><hr>';
}finally {
    echo 'Saldo Atual: ' . $conta->verSaldo();
}