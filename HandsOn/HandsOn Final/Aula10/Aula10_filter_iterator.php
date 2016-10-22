<?php

class FiltroNumeros extends FilterIterator
{
    public function accept()
    {
        $valor = $this->getInnerIterator()->current();
        return ! ($valor % 2);
    }
    
}

$objArray = new ArrayIterator([
    10,
    20,
    50,
    6,
    55,
    78,
    79,
    100,
    88,
    105,
    95,
    15
]);

$numeros = new FiltroNumeros($objArray);



foreach ($numeros as $valor) {
    echo "$valor<br>";
}