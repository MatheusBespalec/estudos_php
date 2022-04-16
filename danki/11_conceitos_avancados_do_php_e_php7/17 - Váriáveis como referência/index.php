<?php 

	$nome = 'Matheus';
	function trocarNome(&$nome){
		$nome = 'João';
	}

	trocarNome($nome);

	echo $nome;

?>