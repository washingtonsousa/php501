<?php
$dsn = 'pgsql:host=localhost;dbname=aula_pdo';
$user = 'pdo';
$pass = '123456';

$conexao = new PDO($dsn, $user, $pass);

// Definindo o modo de erro da classe PDO;

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insert = "INSERT INTO usuarios(nome,email,senha)VALUES(?,?,?)";

$retorno = $conexao->prepare($insert);

for ($x = 0; $x <= 3; $x ++) {
    var_dump($retorno->execute([
        "Mariana Souza Lima - $x",
        "mari.lima_$x@gmail.com",
        '123456'
    ]));
}

