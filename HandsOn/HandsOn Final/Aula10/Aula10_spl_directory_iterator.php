<?php

$diretorio = new DirectoryIterator('/var/www/4501-PHP/HandsOn/Aula10');

foreach ($diretorio as $value){
    echo $value->getFilename();
    echo '<br>' . $value->getSize();
    echo '<br>' . $value->getExtension();
    echo '<hr>';
}

//Glob Iterator, ela permite fazer uso de um filtro

echo '<h1>Glob Iterator</h1>';

$glob = new GlobIterator('/var/www/4501-PHP/HandsOn/Aula10/*.jpg');

foreach ($glob as $value){
    echo $value->getFilename();
    echo '<br>' . $value->getSize();
    echo '<br>' . $value->getExtension();
    echo '<hr>';
}