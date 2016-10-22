<?php

class Usuarios
{
    public $nome;
    public $email;
    
    public static $listaUsuarios = [];
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function salvarUsuario(Usuarios $usuario)
    {
        self::$listaUsuarios[] = $usuario;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public static function listarUsuarios()
    {
        return self::$listaUsuarios;
    }
}

$usuario1 = new Usuarios();
Usuarios::salvarUsuario($usuario1);

$usuario1->setNome('Luana de Oliveira');
$usuario1->setEmail('lu.oliv@gmail.com');


$usuario2 = new Usuarios();
Usuarios::salvarUsuario($usuario2);

$usuario2->setNome('Larissa Costa Lima');
$usuario2->setEmail('lari.costa@gmail.com');

echo 'Total de Usuarios: ' . count(Usuarios::$listaUsuarios);
echo '<br>';
echo 'Total de Usuarios Objeto1: ' . count(Usuarios::$listaUsuarios);;
echo '<br>';
echo 'Total de Usuarios Objeto2: ' . count(Usuarios::$listaUsuarios);;
echo '<hr>';

foreach (Usuarios::listarUsuarios() as $usuario){
    echo 'Nome: ' . $usuario->getNome() . '<br>';
    echo 'Email: ' . $usuario->getEmail() . '<hr>';
}


