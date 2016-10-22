<?php


class Conta {
	
	public $titular = '4linux';
	
	public function getTitular() {
		
		return $this->titular;
		
	}
	
	public function __isset($name) {
		
		echo "{$name} esta setado?";
		return isset($this->name);
		
	}
	

	public function __unsset($name) {
	
		echo "{$name} Apagado";
		unset($this->$name);
	
	}
	
	
}

$conta = new Conta();
echo $conta->getTitular();

var_dump(isset($conta->agencia));
unset($conta->titular);
