<?php

class Db
{

    private $dsn = 'pgsql:host=localhost;dbname=aula_pdo';

    private $user = 'pdo';

    private $pass = '123456';

    public function conectar()
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}