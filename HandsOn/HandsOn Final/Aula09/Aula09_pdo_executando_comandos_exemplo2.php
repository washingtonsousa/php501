<?php

$dsn = 'mysql:host=localhost;dbname=aula_pdo';
$user = 'root';
$pass = '123456';

$conexao = new PDO($dsn, $user, $pass);

// Definindo o modo de erro da classe PDO;

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$insert = "INSERT INTO usuarios(nome,email,senha)VALUES('Maria de Lima','mari_lima@gmail.com','123456')";

$update   = "UPDATE usuarios set senha = '456123'";

$retorno = $conexao->exec($update);

var_dump($retorno);

