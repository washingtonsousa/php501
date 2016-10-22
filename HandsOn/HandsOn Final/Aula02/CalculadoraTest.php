<?php
include 'Calculadora.php';

class CalculadoraTest extends PHPUnit_Framework_TestCase
{

    public function testSoma()
    {
        $calculadora = new Calculadora();
        $this->assertSame(3, $calculadora->somar(1, 2));
        $this->assertSame(4, $calculadora->somar(10,10));
    }
    
    public function testSubtracao()
    {
    	$calculadora = new Calculadora();
    	$this->assertSame(0, $calculadora->subtrair(10, 10));
    	$this->assertSame(4, $calculadora->subtrair(10,10));
    }
}