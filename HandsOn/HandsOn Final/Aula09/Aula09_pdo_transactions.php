<?php
$dsn = 'pgsql:host=localhost;dbname=aula_pdo';
$user = 'pdo';
$pass = '123456';

$conexao = new PDO($dsn, $user, $pass);

// Definindo o modo de erro da classe PDO;

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insert = "INSERT INTO usuarios(nome,email,senha)VALUES('Maria de Lima','mari_lima@gmail.com','123456')";

$conexao->beginTransaction();

for ($x = 0; $x <= 10; $x ++) {
    try {
        if ($x == 9) {
            $insert = 'INSERT INTO SDFSDFD(SFSDF,SDFSD.SFDSF)';
        }
        $conexao->exec($insert);
    } catch (PDOException $err) {
        echo 'Erro: ' . $err->getMessage();
        $conexao->rollBack();
    }
}

$conexao->commit();
    