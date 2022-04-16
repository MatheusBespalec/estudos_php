<?php

	function soma($num1,$num2){
		return $num1 + $num2;
	}

	echo soma(26,2);

	echo '<br>';

	function verdade(){
		return true;
	}

	echo verdade();

	echo '<br>';

	function meuNome($nome){
		$nome = 'Meu nome é '.$nome;
		return $nome;
	}

	echo meuNome('Matheus');

?>