<?php

$arquivo = fopen('lista.txt', 'r');
$cursos = [];

 while (!feof($arquivo)) {
     $cursos[] = fgets($arquivo);
 }

print_r($cursos);
fclose($arquivo);