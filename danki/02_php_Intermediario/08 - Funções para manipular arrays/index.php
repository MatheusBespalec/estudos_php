<?php

	$pares = ['teste'=>0,2,4,6,8];
	$impares = ['teste'=>1,3,5,7,9];
	print_r(array_merge($pares,$impares));
	//Junta 2 arrays, caso nesses dois algum elemento tenha chaves iguais prevalece o valor do primeiro array chamado

	echo '<br>';

	print_r(array_intersect_key($pares,$impares));
	//pega os elementos do arrays com chaves iguais e permenece apenas os do primeiro que foi chamado

	echo '<br>';

	$nomes = ['<h1>João</h1>','Kleber','Richard'];
	print_r(array_map('strip_tags',$nomes));
	//Aplica uma função a todos os elementos do array

?>