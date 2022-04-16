<?php

$arr = [0 => 1, 1 => 5, 2 => 2, 3 => 7 , 4 => null];

if (gettype($arr) == 'array') {
    echo 'É um array' . PHP_EOL;
}

if (is_array($arr) == 'array') {
    echo 'É um array' . PHP_EOL;
}

if (array_is_list($arr)) { // As chaves devem ser numericas devem estar em ordem começando de 0 e indo de 1 em 1
    echo 'É um array numerico' . PHP_EOL;
}
