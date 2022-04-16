<?php

	//Criar Cookie
	setcookie('nome','Matheus',time() + (60*60), '/');
	//Deletar Cookie
	setcookie('nome','Matheus',time() - (60*60), '/');

	echo $_COOKIE['nome'];
?>