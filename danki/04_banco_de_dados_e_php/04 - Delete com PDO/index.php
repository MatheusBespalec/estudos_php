<?php
	
	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');

	$sql = $pdo->prepare("DELETE FROM `clientes` WHERE id=?");

	$id = 2;

	if($sql->execute(array($id))){
		echo 'Cliente Deletado com Sucesso!';
	}

?>