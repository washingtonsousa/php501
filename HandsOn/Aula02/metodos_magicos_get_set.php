<?php


class Usuario {
	
	
	public function __set($name, $value) {
		
		echo "Este atributo nao existe";
		
	}
	
	
	public function __get($name) {
		
		echo "Nao existe";
		
	}
}

$obj = new Usuario();
$obj->nome = "Washington";
$obj->email = "wash@gmail.com";

		echo $obj->nome.$obj->email;