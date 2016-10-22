<?php

class Conta {
	
	
	protected  $titular;
	protected $saldo;
	
	public function depositar($valor) {
		
		$this->saldo +=  $valor;
		
		
		
	}
	
	public function verSaldo() {
		
		echo "<hr /> Saldo Atual: $this->saldo <hr/>";
		
		
	}
	
	public function verTitular() {
		
		echo "Titular: $this->titular";
		
	}
	
}

class Poupanca extends Conta {
	
	
	public function nomearTitular($nome) {
		
		$this->titular = $nome;
		
	}
	
	public function mostrarTipoConta() {
		
		echo "Conta Poupanca"; 
		
	}
	
	
}


$cp = new Poupanca();
$cp->nomearTitular("Washington");
$cp->verTitular();
$cp->depositar("200");
$cp->verSaldo();