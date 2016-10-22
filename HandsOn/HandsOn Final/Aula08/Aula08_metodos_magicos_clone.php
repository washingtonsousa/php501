<?php

class Usuarios
{
    public $nome;
    
    public function __clone()
    {
        echo '<hr>Objeto Clonado<hr>';
    }
}

$usuario1 = new Usuarios;
$usuario1->nome = 'Michelle Santos Leal';

$usuario2 = clone $usuario1;

$usuario2->nome = 'Daniele Fernanda Ribeiro';

echo 'Nome Usuario1: ' . $usuario1->nome;
echo '<br>Nome Usuario2: ' . $usuario2->nome;