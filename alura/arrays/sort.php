<?php

$numbers = [6, 4, 7, 1 , 9, 15, 2];

$tests = [
    'Roberto'   => 9,
    'Ana'       => 10,
    'Gilson'    => 4,
    'Francisco' => 6
];

// Ordena o array em ordem crescente baseado nos valores sem manter a chave associativa
// sort($numbers);

// Ordena o array em orderm crescente baseado nos valores mantendo a chave associativa
// asort($numbers);

// Ordena o array em orderm decrescente baseado nos valores sem manter a chave associativa
//rsort($numbers);

// Ordena o array em orderm decrescente baseado nos valores mantendo a chave associativa
//arsort($numbers);

//print_r($numbers);

// Ordena o array em ordem crescente baseado no valor das chaves
// ksort($tests);

// Ordena o array em ordem decrescente baseado no valor das chaves
krsort($tests);

print_r($tests);