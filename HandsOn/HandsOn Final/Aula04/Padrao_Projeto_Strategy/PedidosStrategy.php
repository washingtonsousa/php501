<?php
require 'Fretes.php';

class Pedidos
{

    public $total;

    public $frete;

    public function calcularPrazoTotal(FretesInterface $frete)
    {
        $dadosFrete = [
            'total' => $frete->getValorFrete(),
            'prazo' => $frete->getPrazo()
        ];
        
        return $dadosFrete;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
}

$tipoPAC = new FretePac();
$tipoPAC->buscar('dados teste');

$pedido = new Pedidos();

$pedido->setTotal(150);
$dadosFrete = $pedido->calcularPrazoTotal($tipoPAC);

echo 'Total Final: ' . $dadosFrete['total'];
echo '<br>Prazo: ' . $dadosFrete['prazo'];