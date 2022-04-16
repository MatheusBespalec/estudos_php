<?php

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'http://localhost/Back-End/08%20-%20Web%20Services%20e%20API/02%20-%20cURL%20e%20criando%20web%20service/request.php');

	curl_setopt($ch, CURLOPT_POST, 1);

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('request'=>'getNoticia')));

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);

	$resultado = json_decode($server_output);

	//print_r($resultado);

	echo $resultado->titulo[0];
	echo '<br>';
	echo $resultado->conteudo[0];

?>