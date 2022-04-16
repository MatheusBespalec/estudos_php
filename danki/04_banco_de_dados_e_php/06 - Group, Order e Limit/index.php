<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("SELECT * FROM `funcionarios` GROUP BY cargo ORDER BY nome ASC LIMIT 1");
	$sql->execute();

	$info = $sql->fetchAll(PDO::FETCH_ASSOC);

	echo '<pre>';
	print_r($info);
	echo '</pre>';

	foreach ($info as $key => $value) {
		echo 'Nome: '.$value['nome'];
		echo '<br>';
	}

?>