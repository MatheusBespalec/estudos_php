<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	//Primeira forma de PUXAR os POSTS por CATEGORIA
	// $sql = $pdo->prepare("SELECT * FROM categorias");

	// $sql->execute();

	// $info = $sql->fetchAll();

	// foreach($info as $key => $value){
	// 	echo 'Categoria: '.$value['nome'];
	// 	echo '<br>';
	// 	$id = $value['id'];
	// 	$sql = $pdo->prepare("SELECT * FROM posts WHERE categoria_id=$id");
	// 	$sql->execute();
	// 	$info_post = $sql->fetchAll();

	// 	foreach ($info_post as $key => $value) {
	// 		echo 'Titulo: '.$value['titulo'];
	// 		echo '<br>';
	// 		echo 'Texto: '.$value['conteudo'];
	// 		echo '<br>';
	// 		echo '<br>';
	// 	}
	// 	echo '<hr>';
	// }

	//Segunda forma

	$sql = $pdo->prepare("SELECT `posts`.*,`categorias`.*,`posts`.`id` AS `posts_id` FROM `posts` INNER JOIN `categorias` ON `categorias`.`id` = `posts`.`categoria_id`");

	$sql->execute();

	$info = $sql->fetchAll(PDO::FETCH_ASSOC);

	// echo '<pre>';
	// print_r($info);
	// echo '<pre>';

	foreach($info as $key => $value){
		echo 'ID do Post - '.$value['posts_id'];
		echo '<br>';
		echo 'Categoria - '.$value['nome'];
		echo '<br>';
		echo 'Titulo da Noticia - '.$value['titulo'];
		echo '<br>';
		echo 'Texto da Notícia - '.$value['conteudo'];
		echo '<br>';
		echo '<hr>';
	}
		
?>