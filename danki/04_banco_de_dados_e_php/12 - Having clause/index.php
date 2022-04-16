<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("SELECT * FROM `staff` GROUP BY cargo HAVING pontos > 10");
	$sql->execute();

	echo '<pre>';
	print_r($sql->fetchAll(PDO::FETCH_ASSOC));
	echo '</pre>';

?>