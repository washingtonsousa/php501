<?php
require 'autoload.php';

use Lib\Banco;
use Entities\UsuariosEntity;
use Entities\ClientesEntity;
use Model\UsuariosModel;
use Model\ClientesModel;

$banco = new Banco();
$entidadeUsuario = new UsuariosEntity();
$entidadeCliente = new ClientesEntity();

$usuarioModel = new UsuariosModel($banco, $entidadeUsuario);
$clienteModel = new ClientesModel($banco, $entidadeCliente);