<?php

	$pdo = new PDO('mysql:host=localhost;dbname=modulo_04','root','');
	//Atualizar Banco de Dados
	//AND = e | OR = ou
	$sql = $pdo->prepare("UPDATE `clientes` SET nome='Gustavo',sobrenome='Apolinario' WHERE nome='Filipe' AND sobrenome='Golçalvez' ");

	//WHERE funcina como um 'if', significa quando então: atualuze clientes colocando nome = Gustavo, sobrenome = Apolinario quando nome = Felipe E sobrenome = Gonçavez 

	if ($sql->execute()) {
		echo 'Cliente Atualizado com Sucesso!';
	}
?>