<?php


class Pai{
	
	protected static $nome = "Pai";
	
	public static function getNome() {
		
		return static::$nome;
		
	}
	
	
}

class filha extends Pai{
	
	
	protected static $nome = "Filha <br />";	
	
}


echo Filha::getNome();
echo Pai::getNome();