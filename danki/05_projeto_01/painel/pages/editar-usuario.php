<div class="box-content w100">
<?php 
	
	Painel::permisionPage(0);

?>

<h2><i class="fas fa-edit"></i> Editar Usuário > </h2>
	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['act'])) {
				$user = new User();
				$nome = $_POST['nome'];
				$pass = $_POST['pass'];
				$img = $_FILES['imagem'];
				$imgAtual = $_SESSION['img'];

				if ($img['name'] != '') {
					if(Painel::validImage($img)){
						$img = Painel::uploadImage($img);
						Painel::deleteFile($imgAtual);
						$_SESSION['pass'] = $pass;
						$_SESSION['nome'] = $nome;
						$_SESSION['img'] = $img;
						if($user->updateUser($_SESSION['user'],$nome,$pass,$img)){
							Painel::alert(true,'Usuário Atualizado com Sucesso!');
						}else{
							Painel::alert(false,'Ops! Ocorreu um Erro ao Atualizar Usuário!');
						}
					}else{
						Painel::alert(false,'Formato de Imgagem não é valido!');
					}
				}else{
					$img = $imgAtual;
					$_SESSION['pass'] = $pass;
					$_SESSION['nome'] = $nome;
					$_SESSION['img'] = $img;
					if($user->updateUser($_SESSION['user'],$nome,$pass,$img)){
						Painel::alert(true,'Usuário Atualizado com Sucesso!');
					}else{
						Painel::alert(false,'Ops! Ocorreu um Erro ao Atualizar Usuário!');
					}
				}
			}

		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $_SESSION['nome'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha:</label>
			<input type="text" name="pass" value="<?php echo $_SESSION['pass'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem:</label>
			<?php unset($_FILES['imagem']);?>
			<input type="file" name="imagem">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="act" value="Atualizar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->