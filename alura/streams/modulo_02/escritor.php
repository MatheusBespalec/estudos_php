<?php

// Eescreve no arquivo, mas apaga o counteudo previo
// $file = fopen('test.txt', 'w');

// Escreve no arquivo fazendo um append
$file = fopen('test.txt', 'a');


$text = 'Minha segunda linha' . PHP_EOL;

fwrite($file, $text);

fclose($file);