<?php

	$frase = 'Meu gato branco cago e pulo do telhado, caiu na caixa de agua da vizinha e ficou molhado';
	echo substr($frase,10,35);

	echo '<br>';

	$nome = 'Matheus Bespalec Daloia';
	$nomes = explode(' ',$nome);
	
	print_r($nomes);
	echo '<br>';
	echo implode(' ',$nomes);

	echo '<br>';
	echo strip_tags('<h1>Matheus</h1>');
	echo '<br>';
	echo htmlentities('<h1>Matheus</h1>');

?>