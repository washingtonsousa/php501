<?php

require 'EntidadeUsuarios.php';
require 'Db.php';
require 'DbFactory.php';
require 'TableGateway.php';
require 'UsuariosMapper.php';

$usuarioMapper = new UsuariosMapper();

$registros = $usuarioMapper->Listar();

echo '<pre>';

print_r($registros);

echo '<hr>';

$registro = $usuarioMapper->buscarPorId(35);

print_r($registro);

echo '<hr>';

$registro->setEmail('email_alterado@ig.com.br');

if($usuarioMapper->salvar($registro)){
    echo '<h1>Dados Salvos</h1>';
}
