<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("SELECT * FROM `filmes` WHERE categoria_id = (SELECT id FROM `categoria_filme` WHERE nome = 'Comédia')");
	$sql->execute();

	$info = $sql->fetchAll(PDO::FETCH_ASSOC);

	echo '<pre>';
	print_r($info);
	echo '</pre>';

?>