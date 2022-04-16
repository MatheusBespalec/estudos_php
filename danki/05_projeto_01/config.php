<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	//Auto Load Class
	$autoload = function($class){
		$class = str_replace('\\','/',$class);
		include('class/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	//Endereço Local
	define('INCLUDE_PATH','http://localhost/Back-End/05%20-%20Projeto_01/'); //Alterar apenas este campo com sua URL
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel/');
	define('BASE_DIR',__DIR__);

	// Conexão MySql Alterar os 4 com base na sua conexão atual com o Banco de Dados
	define('HOST','localhost');
	define('DB','projeto_01');
	define('USER', 'root');
	define('PASS', '');

	//Cargo User
	function getCargo($index){
		
		return(Painel::$cargo[$index]);
	}
	
?>