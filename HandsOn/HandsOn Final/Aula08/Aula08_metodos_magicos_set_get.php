<?php

class Usuarios
{
    protected $nome;
    protected $email;
    
    public function __set($atributo, $valor)
    {
        if(property_exists($this, $atributo)){
            $this->$atributo = $valor;
        }else{
            echo "<hr>Erro a propriedade $atributo não existe<hr>";
        }
    }
    
    public function __get($atributo)
    {
        if(property_exists($this, $atributo)){
            return $this->$atributo;
        }
    }
}

$usuario = new Usuarios();
$usuario->nome = 'Leticia Lima Souza';
$usuario->email = 'let.lima@ig.com.br';
$usuario->senha = '456123';

echo 'Nome do Usuario: ' . $usuario->nome;
echo '<br>Email do Usuario: ' . $usuario->email;

echo '<pre><hr>';
var_dump($usuario);