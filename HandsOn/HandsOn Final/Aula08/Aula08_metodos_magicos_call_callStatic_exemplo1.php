<?php

class Usuarios
{
    protected $nome;
    protected $email;
    
    public function __call($metodo, $atributos)
    {
        echo "<hr>Metodo $metodo foi chamado, porém ele não existe os seguintes parametros forma passados";
        echo '<pre>';
        print_r($atributos);
        echo '<hr>';
    }
    
    public static function __callstatic($metodo, $atributos)
    {
        echo "<hr>Metodo $metodo foi chamado de forma estática, porém ele não existe os seguintes parametros forma passados";
        echo '<pre>';
        print_r($atributos);
        echo '<hr>';
    }
}

$usuario = new Usuarios();
$usuario->setNome('Luciana de Almeida', 'jgjjhgjhgj');
Usuarios::listar('sdfsdfsdf');