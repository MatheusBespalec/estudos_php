<?php

	//Spleep para de executar o codigo pelo tempo que colocamos como parametro, depois volta ao normal
	
	// sleep(3);
	// echo 'Ola Mundo!';

	//Die para de executar o código e podemos colocar uma mensagem

	$nome = 'Francisco';

	if ($nome == 'João') {
		echo 'Meu nome é '.$nome;
	}else{
		die('Código Morreu');
	}
?>