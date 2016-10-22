<?php

trait Operacoes {
	
	public function depositar($valor) {
		
		$this->saldo += $valor;
		
	}
	
	public function sacar($valor) {
	
		$this->saldo -= $valor;
	
	}
	
	
	
}

class Conta {
	
	
	use  Operacoes;
	
	public $saldo;
	public $titular;
	
	public function verSaldo() {
		
		echo "<hr /> Saldo: {$this->saldo} <hr />";
		
	}

	public function mostrarMetodo() {
	
		echo "Conta";
	
	}
	
}

class Poup extends Conta {
	
	use Operacoes;
	
	public function mostrarMetodo() {
	
		echo "Poup";
	
	}
	
}


/*$obj = new Conta();
$obj->depositar(700);
$obj->verSaldo();
$obj->sacar(300);
$obj->verSaldo();*/
	
$obj = new Poup();
$obj->mostrarMetodo();
echo "<hr />";
$obj2 = new Conta();
$obj->mostrarMetodo();