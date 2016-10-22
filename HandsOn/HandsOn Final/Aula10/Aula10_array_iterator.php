<?php
$objArray = new ArrayIterator([
    10,
    20,
    50,
    6,
    55,
    78,
    79
]);

foreach ($objArray as $valor) {
    echo "$valor<br>";
}