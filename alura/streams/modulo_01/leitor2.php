<?php

$arquivo = fopen('lista.txt', 'r');

$fs = filesize('lista.txt');
$lista = fread($arquivo, $fs);

echo $lista;

fclose($arquivo);