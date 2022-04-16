<?php
	
	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$pdo->exec("LOCK TABLES `funcionarios` WRITE");

	sleep(10);

?>