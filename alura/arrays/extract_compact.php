<?php

$caneta = ['marca' => 'BIC', 'cor' => 'Preta'];

// Cria variaveis com os elementos do array onde o nome da chave se torna o nome da variavel
extract($caneta);

var_dump($marca, $cor);

$nome = 'Vinicius';
$idade = 15;

// Cria um array a partir do nome de variaveis
print_r(compact('nome', 'idade'));