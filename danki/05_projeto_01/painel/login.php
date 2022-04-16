<?php

	if (isset($_COOKIE['lembrar'])) {
		$user = $_COOKIE['user'];
		$pass = $_COOKIE['pass'];
		$sql = MySql::conect()->prepare("SELECT * FROM `tb_admin.user` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$pass));
		if ($sql->rowCount() == 1) {
			$info = $sql->fetch();
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('Location: '.INCLUDE_PATH_PAINEL);
			die();
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
			<!-- Google Fonts -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
		<!--  -->

		<title>Painel de Controle</title>

		<!-- Meta Tags -->
			<!-- UTF-8 -->
			<meta charset="utf-8">
			<!-- Responsivo -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="author" content="Matheus Bespalec - matheusbespalec@gmail.com">
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<meta name="robots" content="noindex,nofollow">
		<!--  -->
	<body>

		<div class="wraper-login">
			<div class="box-login">
				<?php MySql::conect(); ?>
				<h2>Login:</h2>
				<?php 
					if (isset($_POST['act'])) {
						$_SESSION['login'] = true;
						$user = $_POST['user'];
						$pass = $_POST['pass'];

						$sql = MySql::conect()->prepare("SELECT * FROM `tb_admin.user` WHERE user = ? AND password = ?");
						$sql->execute(array($user,$pass));
						if ($sql->rowCount() == 1) {
							$info = $sql->fetch();
							$_SESSION['user'] = $user;
							$_SESSION['pass'] = $pass;
							$_SESSION['cargo'] = $info['cargo'];
							$_SESSION['nome'] = $info['nome'];
							$_SESSION['img'] = $info['img'];
							if (isset($_POST['lembrar'])) {
								setcookie('lembrar',true,time()+(60*60*24*7),'/');
								setcookie('user',true,time()+(60*60*24*7),'/');
								setcookie('pass',true,time()+(60*60*24*7),'/');
							}
							header('Location: '.INCLUDE_PATH_PAINEL);
							die();
						}else{
							echo "<p class=\"error-login\">Usuário ou Senha Incorreto!</p>";
						}
					}

				?>
				<form method="post">
					<p>Usuário:</p>
					<input type="text" name="user" required>
					<p>Senha:</p>
					<input type="password" name="pass" required>
					<div class="group-lembrar">
						<input type="checkbox" id="lembrar" name="lembrar" value="lembrar">
  						<label for="lembrar">Lembrar-me</label>
  					</div><!--group-lembrar-->

					<input type="submit" name="act" value="Entrar!">
				</form>
			</div><!--box-login-->
		</div><!--wraper-login-->

	</body>
</html>