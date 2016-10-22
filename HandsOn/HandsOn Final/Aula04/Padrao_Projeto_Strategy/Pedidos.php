<?php

class Pedidos
{

    public $total;

    public $frete;

    public function calcularTotal($tipo)
    {
        switch ($tipo) {
            case 'PAC':
                $frete = 25;
                break;
            case 'SEDEX':
                $frete = 45;
                break;
            case 'SEDEX10':
                $frete = 65;
                break;
            default:
                return 'Frete Inválido';
        }
        
        return $this->total + $frete;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
}

$pedido = new Pedidos();
$pedido->setTotal(150);
echo 'Total Final: ' . $pedido->calcularTotal('SEDEX');