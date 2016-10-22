<?php

class Usuarios
{

    private $id;

    private $nome;

    private $email;

    private $telefone;

    private $senha;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelefone(Telefone $telefone)
    {
        $this->telefone = $telefone;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }
}

class Telefone
{

    public  $numero;

    public  $tipo;

    public function __construct($numero, $tipo)
    {
        $this->numero = $numero;
        $this->tipo = $tipo;
    }
}

$usuario = new Usuarios();
$telfoenUsuario = new Telefone('4044-2010', 'RESIDENCIAL');

$usuario->setId(1);
$usuario->setNome('Mariana de Almeida');
$usuario->setEmail('mari.al@globo.com');
$usuario->setTelefone($telfoenUsuario);
$usuario->setSenha('123456');

echo 'Id: ' . $usuario->getId();
echo '<br>Nome: ' . $usuario->getNome();
echo '<br>Email: ' . $usuario->getEmail();
echo '<br>Email: ' . $usuario->getTelefone()->numero;
echo '<br>Senha: ' . $usuario->getSenha();
