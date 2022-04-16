<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("SELECT * FROM `cadastro` WHERE email LIKE 'm%'");
	$sql->execute();

	$email = $sql->fetchAll();
	echo '<pre>';
	print_r($email);
	echo '</pre>';


?>