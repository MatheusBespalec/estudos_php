<?php
	//Quando vamos utilizar Data é sempre nescessario especificar no começo do documento qual a localização

	date_default_timezone_set('America/Sao_Paulo');

	include('header.php');

	$data = date('d/m/Y H:i:s',time()+(60*10));
	echo $data;

?>