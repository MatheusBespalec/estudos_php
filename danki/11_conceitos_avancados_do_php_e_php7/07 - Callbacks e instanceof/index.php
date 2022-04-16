<?php

	class A{

	}

	$a = new A;
	$b = 0;

	if($b instanceof A)
		echo 'A variavel faz instancia a Classe A';
	else
		echo 'A variavel não faz instancia a Classe A';

	echo '<br>';

	function printNome($func,$nome = 'Matheus'){
		if(is_callable($func))
			$func($nome);
	}

	printNome(function($nome){
		echo 'Meu nome é: '.$nome;
	});

?>