<?php

$alunosAntigos = ['teste' => 'Mario', 'Alice', 'João', 'Guilherme' , 'Fernando'];
$alunosNovos = ['teste' => 'Marcos', 'Roger', 'Maria', 'Gustavo' , 'Larissa'];

// array_merge junta os arrays que foram passados e reordena chaves numericas para que os valores não sejam reescritos
// Caso tenhamos strings como chaves e elas se repitam o valor do segundo array prevalece
print_r(array_merge($alunosAntigos, $alunosNovos));

// Com arrays o '+' faz a mesma coisa que o array merge, porém ele mantem as chaves então caso não sejam definidas o 
// primeiro array sobreescrevera o segundo
print_r($alunosAntigos + $alunosNovos);

// Unpacking Operator | Em contexto de parametro de função seria Spread Operator
// Disponivel apartir do php 7.1 e antes do 8.1 não é possivel usar com arrays com chaves de string
// Possui o mesmo comportamento de array_merge
print_r([...$alunosAntigos, ...$alunosNovos]);
