<?php

require 'EntidadeUsuarios.php';
require 'Db.php';
require 'DbFactory.php';
require 'TableGateway.php';
require 'UsuariosMapper.php';

$usuario = new Usuarios();
$usuario->setId(35);
$usuario->setEmail('dpr001@gmail.com');
$usuario->setNome('Denis Perciliano Ribeiro');
$usuario->setSenha('123456');

$usuarioMapper = new UsuariosMapper();

$retorno = $usuarioMapper->salvar($usuario);

if($retorno){
    echo '<h1>Dados Salvos</h1>';
}else{
    echo '<h1 styele="color:red">Erro ao Salvar os Dados!</h1>';
}
