<?php

	class Pessoa{

		private function montarFrase($nome,$email){
			return 'Nome: '.$nome.' <br>Email: '.$email;
		}

		public function status($nome,$email){
			echo $this->montarFrase($nome,$email);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		if(isset($_POST['acao'])){
			$nome = $_POST['nome'];
			$idade = $_POST['email'];

			$cliente[] = new Pessoa();
			$cliente[0]->status($nome,$idade);
		}

	?>
	<form method="post">
		<input type="text" name="nome" required>
		<input type="text" name="email" required>
		<input type="submit" name="acao" value="Cadastrar">
	</form>
</body>
</html>