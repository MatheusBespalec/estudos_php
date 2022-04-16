<title>Index 1</title>
<?php

	session_start();
	
	//Deleta a Sessão
	//unset($_SESSION['nome']);

	//Destroi todas as Sessões
	//session_destroy();
	
	if(isset($_SESSION['nome']))
		echo $_SESSION['nome'];
	echo '<br>';
	if(isset($_SESSION['idade']))
		echo $_SESSION['idade'];
	echo $_COOKIE['nome'];
?>