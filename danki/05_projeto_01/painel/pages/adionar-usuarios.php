<div class="box-content w100">
<?php 
	
	Painel::permisionPage(2);

?>

<h2><i class="fas fa-edit"></i> Editar Usuário > </h2>
	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['act'])) {
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$pass = $_POST['pass'];
				$cargo = $_POST['cargo'];
				$imagem = $_FILES['imagem'];

				if ($login == '') {
					Painel::alert(false,'Preencha o campo \'Login\'!');
				}else if($nome == ''){
					Painel::alert(false,'Preencha o campo \'Nome\'!');
				}else if($pass == ''){
					Painel::alert(false,'Preencha o campo \'Senha\'!');
				}else if($cargo == ''){
					Painel::alert(false,'Preencha o campo \'Cargo\'!');
				}else{
					if ($cargo > $_SESSION['cargo']) {
						Painel::alert(false,'Você precisa selecionar um cargo menor que o seu!');
					}else if($imagem['name'] != '' && Painel::validImage($imagem) == false){
						print_r($imagem);
						Painel::alert(false,'Formato de Imagem Invalido!');
					}else if(User::userExists($login)){
						Painel::alert(false,'Este login já existe, tente outro!');
					}else{
						$user = new User();
						$imagem = Painel::uploadImage($imagem);
						if($user->newUser($login,$pass,$nome,$imagem,$cargo))
							Painel::alert(true,'O usuário '.$login.' foi cadastrado com sucesso!');
						else
							Painel::alert(false,'Erro ao cadastrar '.$login.'!');
					}
				}		

			}

		?>

		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha:</label> 
			<input type="text" name="pass">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<?php

					foreach (Painel::$cargo as $key => $value) {
						if($key < $_SESSION['cargo']) {
							echo '<option value="'.$key.'">'.$value.'</option>';
						}
					}
					 
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem:</label>
			<input type="file" name="imagem">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->