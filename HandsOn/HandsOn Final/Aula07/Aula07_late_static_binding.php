<?php

class ClassePai
{

    protected static $nomeClasse = __CLASS__;

    public static function getNomeClasse()
    {
        return static::$nomeClasse;
    }
}

class ClasseFilha extends ClassePai
{

    protected static $nomeClasse = __CLASS__;
}

echo 'Nome da Classe Pai: ' . ClassePai::getNomeClasse();
echo '<hr>';
echo 'Nome da Classe Filha: ' . ClasseFilha::getNomeClasse();