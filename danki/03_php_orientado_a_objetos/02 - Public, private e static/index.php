<?php
	include('exemplo.php');
	$cliente = new Cliente;

	$cliente->setNome('Matheus');
	$cliente->setIdade(19);
	echo Cliente::$status;
	echo Cliente::frase();

?>