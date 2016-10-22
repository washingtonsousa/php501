<?php
trait CRUDUsuario {
	
	public function cadastrarUsuario() {
		

		echo "Cadastrando....";
		
	}
	
	public function deletarUsuario() {
	
	
		echo "deletando....";
	
	}
	
	public function validarCPF() {
	
		echo "Validando CPF";
	
	}
}

trait Validacoes {
	
	
	public function validarCPF() {
		
		echo "Validando CPF";
		
	}
	
	public function validarEmail() {
	
		echo "Validando Email";
	
	}
	
	
	
	
}

class Usuario {
	
	
	use CRUDUsuario, Validacoes{
	Validacoes::ValidarCPF insteadof CRUDUsuario;
	}
	
}

$obj = new Usuario();
$obj->cadastrarUsuario();
$obj->validarCPF();
$obj->validarEmail();