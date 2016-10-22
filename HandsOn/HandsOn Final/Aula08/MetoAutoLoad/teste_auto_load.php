<?php

function __autoload($classe)
{
    echo "<hr> $classe.php incluido <hr>";
    require "$classe.php";   
}


$titular = new Titular();
$conta = new Contas($titular);

echo '<pre>';
var_dump($titular);
echo '<hr>';
var_dump($conta);