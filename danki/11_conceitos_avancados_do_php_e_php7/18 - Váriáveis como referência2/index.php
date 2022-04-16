<?php 

	$nome = 'Matheus';

	$teste = &$nome;

	$teste = 'João';

	$nome = 'Guilherme';
	echo $teste;

?>