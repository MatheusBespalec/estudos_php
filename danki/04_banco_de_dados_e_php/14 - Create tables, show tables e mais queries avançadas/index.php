<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$tables = $pdo->query("SHOW TABLES");
	$tables = $tables->fetchAll(PDO::FETCH_ASSOC);

	echo '<pre>';
	print_r($tables);
	echo '</pre>';

	$newTable = 'CREATE TABLE teste(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	categoria VARCHAR(100) NOT NULL
	)';

	$pdo->exec($newTable);
?>