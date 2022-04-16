<!DOCTYPE html>
<html>
	<head>
		<title>Formulario</title>
	</head>
	<body>
		<?php

			if(isset($_GET['acao'])){
				$nome = $_GET['nome'];
				$email = $_GET['email'];

				echo $nome;
				echo '<br>';
				echo $email;
			}

		?>
		<!-- 
		<form>
			<input type="text" name="nome">
			<input type="text" name="email">
			<input type="submit" name="acao" value="Enviar">
		</form> 
		-->
		<?php

			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$email = $_POST['email'];

				echo $nome;
				echo '<br>';
				echo $email;
			}

		?>
		<form method="post">
			<input type="text" name="nome">
			<input type="text" name="email">
			<input type="submit" name="acao" value="Enviar">
		</form> 
		<!--  -->
		<form method="post">
			<input type="checkbox" name="valor[]" value="10">10<br>
			<input type="checkbox" name="valor[]" value="20">20<br>
			<input type="checkbox" name="valor[]" value="30">30<br>
			<input type="checkbox" name="valor[]" value="40">40<br>
			<input type="checkbox" name="valor[]" value="50">50<br>
			<input type="submit" name="acao2" value="Somar">
		</form> 
		<?php

			if(isset($_POST['acao2'])){
				$result = 0;
				foreach($_POST['valor'] as $key => $value){
					$result = $result + $value;
				}
				echo $result;
			}

		?>

	</body>
</html>