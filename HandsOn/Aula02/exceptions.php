<?php
class Conta{
	

	private $titular;
	private $saldo;
	
	
	public function getTitular() {
		
		return $this->titular;
		
		
	}
	public function getSaldo() {
	
		return $this->saldo;
	
	
	}
	
	public function setTitular($nome) {
	
		 $this->titular = $nome;
	
	
	}
	
	public function depositar($valor) {
		
		$this->saldo += $valor;
		
		
	}
	
	public function sacar($valor) {
	
		$this->saldo -= $valor;
		
		if ($valor > $this->saldo){
			
			throw new Exception("Saldo Insuficiente", 1000);
			
		} else {
			
			$this->saldo -= $valor;
			
		}
	
	
	}
	
	public function __construct() {
		
		try {
		
			$conta = new Conta();
			$conta->setTitular("Titular da conta");
			$conta->depositar(900);
			$valorsaque = 1000;
			$conta->sacar($valorsaque);
		
		} catch (Exception $e) {
		
			echo "Erro {$e->getCode()} - <b> {$e->getMessage()}</b>";
			echo "<br />";
				
				
		
		
		}finally {
		
			$saldo_correto = $conta->getSaldo() + $valorsaque;
			echo "Saldo atual: $saldo_correto";
		
		}
		
		
	}
	
}


