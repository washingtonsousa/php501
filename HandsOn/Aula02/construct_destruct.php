<?php
class Usuario{
	
	private $nome;
	private $email;
	
	public function __construct(array $dados) {
		foreach ($dados as $index => $value) {
			
			$this->$index = $value;
			
		}
	
		
		
	}
	
	public function getNome () {
		
		return $this->nome;
		
	}
	
	public function getEmail () {
	
		return $this->email;
	
	}
	
	
}


$dados = array ("nome"=>"Washington","email"=>"Washington.inf@gmail.com");
$obj = new Usuario($dados);
echo $obj->getNome();
echo "<br/>";
echo $obj->getEmail();