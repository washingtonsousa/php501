<?php

class Usuario {
	
	public static $tipoUsuario = "Administrativo";
	public $nome;
	private $email;
		
		
		public function setNome($valor) {
			
			$this->nome = $valor;
			
		}
	
	public function setEmail($valor) {
		
		$this->email = $valor;
		
	}
	
	public function getNome() { return $this->nome; }
	public function getEmail() {return $this->email; }
	
	public static function mostrarTipoUsuario() {
		
		return self::$tipoUsuario;
		
	}
}

$obj = new Usuario();
$obj->setNome("Washington");
$obj->setEmail("washington.inf@gmail.com");

echo "Nome: {$obj->getNome()}";
echo "Email: {$obj->getEmail()}";
echo "Tipo do usuario:".Usuario::mostrarTipoUsuario();