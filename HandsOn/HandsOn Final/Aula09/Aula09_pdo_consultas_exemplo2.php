<?php

$dsn = 'mysql:host=localhost;dbname=aula_pdo';
$user = 'root';
$pass = '123456';

$conexao = new PDO($dsn, $user, $pass);

// Definindo o modo de erro da classe PDO;

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'SELECT * FROM usuarios';

$retorno = $conexao->query($query);

$registros = $retorno->fetchAll(PDO::FETCH_OBJ);

foreach ($registros as $registro){
    echo 'Id: ' . $registro->id;
    echo '<br>Nome: ' . $registro->nome;
    echo '<br>Email: ' . $registro->email;
    echo '<br>Senha: ' . $registro->senha;
    echo '<hr>';
}

echo '<pre>';

print_r($registros);
