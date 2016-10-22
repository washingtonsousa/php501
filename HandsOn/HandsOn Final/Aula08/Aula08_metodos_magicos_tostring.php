<?php
class Usuarios
{
  public function __toString()
  {
      return __CLASS__;
  }
}

$usuario = new Usuarios();
echo $usuario;
