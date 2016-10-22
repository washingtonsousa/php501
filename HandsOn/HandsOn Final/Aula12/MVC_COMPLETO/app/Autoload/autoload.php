<?php

function autoload($classe)
{
    $classe = str_replace('\\', DIRECTORY_SEPARATOR , $classe);
    $classe = "../app/$classe.php";
    
    if(file_exists($classe)){
        require $classe;
    }else{
        echo '<h1>Arquivo não encontrado</h1> ' . $classe;
    }
}

spl_autoload_register('autoload');