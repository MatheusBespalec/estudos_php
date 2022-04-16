<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("SELECT * FROM `funcionarios` LEFT JOIN `cargos` ON `funcionarios`.`cargo` = `cargos`.`id`");
	$sql->execute();

	$info = $sql->fetchAll(PDO::FETCH_ASSOC);

	// echo '<pre>';
	// echo print_r($info);
	// echo '</pre>';

	foreach($info as $key => $value){
		echo $value['nome'];
		echo ' | ';
		echo $value['cargo_nome'];
		echo '<hr>';
	}

?>

<title>Index</title>