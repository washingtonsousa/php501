<?php


require ("bra_nmspc.php");
require ("itau_nmspc.php");

use bradesco as bra;
$bra = new bradesco\Conta();
$bra->setBanco("teste");
echo $bra->getBanco();
