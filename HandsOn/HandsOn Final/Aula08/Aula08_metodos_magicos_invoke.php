<?php
class Usuarios
{
  public function __invoke()
  {
      $parametros = func_get_args();
      echo '<pre>';
      print_r($parametros);
      echo '<hr>Metodo Invoke Executado<hr>';
  }
  
  
}

$usuario = new Usuarios();
echo $usuario('Nome','Email');
