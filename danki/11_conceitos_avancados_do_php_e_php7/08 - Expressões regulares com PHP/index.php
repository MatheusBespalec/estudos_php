<?php
	
	// $nome = 'Matheus';
	// preg_match('/(.*?)the(.*)/', $nome,$resultado);

	// echo '<pre>';
	// print_r($resultado);
	// echo '</pre>';

	function validCpf($cpf){
		return preg_match('/[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}/', $cpf);
	}

	if(isset($_POST['action'])){
		$cpf = $_POST['cpf'];

		if(validCpf($cpf))
			echo 'CPF Válido!';
		else
			echo 'CPF Inválido!';
	}

?>

<form method="post">
	<input type="text" name="cpf" />
	<input type="submit" name="action" />
</form>