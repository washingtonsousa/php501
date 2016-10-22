<?php
class constantes {
	
	
	public $nota1;
	public $nota2;
	
	const aprovado = 7;
	const reprovado = 6;
	
	
	public function media() {
		
		return ($this->nota1 + $this->nota2)/2;
		
	}
}

$obj = new constantes();
$obj-> nota1= 10;
$obj-> nota2= 10;
$media = $obj->media();

if ($media >= constantes::aprovado) {
	
	echo "Aprovado";
	
} else if ($media<=constantes::reprovado) {
	
	echo "Reprovado";
	
} else {
	
	echo "Recuperacao";
	
}

