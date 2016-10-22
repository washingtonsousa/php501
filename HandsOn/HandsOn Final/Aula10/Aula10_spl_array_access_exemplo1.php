<?php

Class Usuarios implements ArrayAccess
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
    
    public function offsetGet($offset)
    {
        if(property_exists($this, $offset)){
            return $this->$offset;
        }
    }
    
    public function offsetSet($offset, $value)
    {
        if(property_exists($this, $offset)){
            $this->$offset = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}

$usuario = new Usuarios();

$usuario->id = 10;
$usuario['id'] = 20;
$usuario['nome'] = 'Luciana Lima';
$usuario['email'] = 'luct.lima@gmail.com';
$usuario['senha'] = '123456';

echo '<pre>';
print_r($usuario);

echo '<hr>';

foreach ($usuario as $atributo => $valor){
    echo "Atributo: $atributo <br>";
    echo "Valor: $valor";
    echo '<hr>';
}