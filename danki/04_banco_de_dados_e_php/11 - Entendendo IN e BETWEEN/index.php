<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("SELECT * FROM `cadastro` WHERE id IN (1,5)");
	$sql->execute();

	$info = $sql->fetchAll();

	echo '<pre>';
	print_r($info);
	echo '</pre>';

	echo '<hr>';

	$sql = $pdo->prepare("SELECT * FROM `cadastro` WHERE id BETWEEN 2 AND 4");
	$sql->execute();

	$info2 = $sql->fetchAll();

	echo '<pre>';
	print_r($info2);
	echo '</pre>';


?>