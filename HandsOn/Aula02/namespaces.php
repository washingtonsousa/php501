
<?php

class Conta {


	protected  $titular;
	protected $saldo;
    protected  $banco;
    
	public function depositar($valor) {

		$this->saldo +=  $valor;



	}

	public function getSaldo() {

	
   return $this->$saldo;

	}

	public function getTitular() {
		return $this->$titular;
	}	
	
	public function getBanco() {
		
		return $this->banco;
		
		}

	
	public function setBanco($valor) {
	
	 $this->banco = $valor;
	
	}
	
	public function setTitular($valor) {
	
		$this->$titular = $valor;
	
	}
	
	
	
}

class ContaBradesco extends Conta {

public function __construct() {

	$this->setBanco("Bradesco");
	
	
	
}

}

class ContaItau extends Conta {

	public function __construct() {

		$this->setBanco("Itau");



	}

}

$bra = new ContaBradesco();
echo $bra->getBanco();