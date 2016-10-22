<?php

class Usuarios implements ArrayAccess, Countable, Iterator
{

    private $usuarios = [];

    private $index;

    public function offsetExists($offset)
    {
        return isset($this->usuarios[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->usuarios[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (! isset($offset)) {
            return $this->usuarios[] = $value;
        }
        
        return $this->usuarios[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->usuarios[$offset]);
    }

    public function count()
    {
        return count($this->usuarios);
    }

    public function current()
    {
        return $this->usuarios[$this->index];
    }

    public function next()
    {
        return $this->index ++;
    }

    public function valid()
    {
        return isset($this->usuarios[$this->index]);
    }

    public function rewind()
    {
        return $this->index = 0;
    }

    public function key()
    {
        return $this->index;
    }
}

class Usuario
{

    protected $nome;

    protected $email;

    protected $senha;

    public function __construct($nome, $email, $senha)
    {
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
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

$usuarios = new Usuarios();
$usuarios[] = new Usuario('Carolina dos Santos 1', 'carol.santos_1@gmail.com', '123456');
$usuarios[] = new Usuario('Carolina dos Santos 2', 'carol.santos_2@gmail.com', '123456');
$usuarios[] = new Usuario('Carolina dos Santos 3', 'carol.santos_3@gmail.com', '123456');

$usuarios[10] = new Usuario('Carolina dos Santos 10', 'carol.santos_10@gmail.com', '123456');

echo '<h1>Total de Usuarios: ' . count($usuarios) . '</h1>';

var_dump($usuarios[10]);
echo '<hr>';

echo 'Nome Usuario 1: ' . $usuarios[10]->getNome();
echo '<br>Email Usuario 1: ' . $usuarios[10]->getEmail();
echo '<br>Senha Usuario 1: ' . $usuarios[10]->getSenha();
echo '<hr>';
echo '<pre>';
print_r($usuarios);

echo '<hr>';

foreach ($usuarios as $usuario) {
    echo '<pre>';
    print_r($usuario);
    echo '<hr>';
}
