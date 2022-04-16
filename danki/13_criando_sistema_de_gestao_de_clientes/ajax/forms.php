<?php

	include('../config.php');

	$nome  = $_POST['nome'];
	$email = $_POST['email'];
	$tipo  = $_POST['tipo'];
	$cpf   = $_POST['cpf'];
	$cnpj  = $_POST['cnpj'];

	if ($cpf == '') 
		$cpf_cnpj = $cnpj;
	else
		$cpf_cnpj = $cpf;
		

	if ($nome == '' || $email == '' || $cpf_cnpj == '') {
		$data['mensagem'] = 'Campos Vazios não são permitidos!';
		$data['tipo'] = 'erro';
	}else{
		$data['mensagem'] = 'Cliente cadastrado com sucesso!';
		$data['tipo'] = 'sucesso';

		Painel::insert(['nome_tabela'=>'tb_admin.clientes',$nome,$email,$tipo,$cpf_cnpj]);
	}

	die(json_encode($data));

?>