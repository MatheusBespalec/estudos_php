<div class="box-content">

	<h2>Cadastrar Produto</h2>

	<form method="post" enctype="multipart/form-data">
		
		<?php 

			if(isset($_POST['action'])){
				$nome        = $_POST['nome'];
				$descricao   = $_POST['descricao'];
				$largura     = $_POST['largura'];
				$altura      = $_POST['altura'];
				$comprimento = $_POST['comprimento'];
				$peso        = $_POST['peso'];
				$quantidade  = $_POST['quantidade'];

				$imagens = $_FILES['imagem'];
				$nomeImagem = [];
				$amountImagens = count($_FILES['imagem']['name']);

				$sucesso = true;

				if($_FILES['imagem']['name'][0] == ''){
					Painel::alert(false,'Você precisa selecionar pelomenos uma imagem!');
					$sucesso = false;
				}else{
					for ($i = 0; $i < $amountImagens; $i++) { 
						$imagemAtual = ['type'=>$imagens['type'][$i],'size'=>$imagens['size'][$i]];

						if(Painel::validImage($imagemAtual) == false){
							$sucesso = false;
							Painel::alert(false,'O formato de pelomenos uma imagem é Inválido!');
							break;
						}
					}
				}

				if($sucesso){
					for ($i = 0; $i < $amountImagens; $i++) { 
						$imagemAtual = ['tmp_name'=>$imagens['tmp_name'][$i],'name'=>$imagens['name'][$i]];
						$nomeImagem[] = Painel::uploadImage($imagemAtual);
					}

					$sql = MySql::conect()->prepare("INSERT INTO `tb_admin.produtos` VALUES (null,?,?,?,?,?,?,?)");
					$sql->execute([$nome,$descricao,$largura,$altura,$comprimento,$peso,$quantidade]);
					$lastId = MySql::conect()->lastInsertId();

					foreach($nomeImagem as $key => $value) { 
						MySql::conect()->exec("INSERT INTO `tb_admin.produtos_imagens` VALUES (null,$lastId,'$value')");
					}

					Painel::alert(true,'Produto Cadastrado com sucesso!');
				}

			}

		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Descrição:</label>
			<textarea name="descricao"></textarea>
		</div><!--form-group-->


		<div class="form-group">
			<label>Largura:</label>
			<input type="number" name="largura" min="0" value="0">
		</div><!--form-group-->

		<div class="form-group">
			<label>Altura:</label>
			<input type="number" name="altura" min="0" value="0">
		</div><!--form-group-->

		<div class="form-group">
			<label>Comprimento:</label>
			<input type="number" name="comprimento" min="0" value="0">
		</div><!--form-group-->

		<div class="form-group">
			<label>Peso:</label>
			<input type="number" name="peso" min="0" value="0">
		</div><!--form-group-->

		<div class="form-group">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" min="0" value="0">
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagens do Produto:</label>
			<input multiple type="file" name="imagem[]">
		</div><!--form-group-->

		<input type="submit" name="action" value="Cadastrar!">
	</form>

</div><!--box-content-->