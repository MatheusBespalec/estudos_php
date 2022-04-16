<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}else{
		Painel::alert(false,'Não existem parametros!');
		die();
	}



?>

<h2><i class="far fa-file-alt"></i> Editar Serviço > </h2>
	<form method="post" enctype="multipart/form-data">
		<?php

			$noticia = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias` WHERE id = ?");
			$noticia->execute([$id]);
			$noticia = $noticia->fetch();

			if (isset($_POST['act'])) {
				$verifica = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ? AND id != ?");
				$verifica->execute([$_POST['titulo'],$id]);
				if ($verifica->rowCount() == 1) {
					Painel::alert(false,'Já existe um titulo com esse nome!');
				}else{
					$titulo = $_POST['titulo'];
					$categoria = $_POST['categoria_id'];
					$conteudo = $_POST['conteudo'];
				 	$capa = $_FILES['capa'];
					if($capa['tmp_name'] == ''){
						$capa = $_POST['capa_atual'];
						$arr = ['nome_tabela'=>'tb_site.noticias','id'=>$id,'categoria_id'=>$categoria,'data'=>date('Y-m-d'),'titulo'=>$titulo,'conteudo'=>$conteudo,'capa'=>$capa];
						if(Painel::update($arr))
							Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
						else
							Painel::alert(false,'Erro ao atualizar noticia!');
					}else{
						$capaAtual = $_POST['capa_atual'];
							if (Painel::validImageSlide($capa)) {
								if($capa = Painel::uploadImage($capa)){
									Painel::deleteImageslide($capaAtual);
									
									$arr = ['nome_tabela'=>'tb_site.noticias','id'=>$id,'categoria_id'=>$categoria,'titulo'=>$titulo,'conteudo'=>$conteudo,'capa'=>$capa];
									if(Painel::update($arr))
										Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
									else
										Painel::alert(false,'Erro ao atualizar noticia!');
							}else{
								Painel::alert(false,'Erro ao subir imagem!');
							}
						}else{
							Painel::alert(false,'Formato de imagem invalido!');
						}
					}
				}
			}

		?>

		<div class="form-group">
			<label>Titulo:</label>
			<select name="categoria_id">
				<?php 
					$categoria = Painel::listTable('tb_site.categoria');
					foreach ($categoria as $key => $value) {		
				?>
						<option <?php if($value['id'] == $noticia['categoria_id']){echo 'selected';} ;?> value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
				<?php	
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" name="titulo" value="<?php echo $noticia['titulo']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Conteudo:</label>
			<textarea class="tinymce" name="conteudo"><?php echo $noticia['conteudo']; ?></textarea>
		</div><!--form-group-->

		<div class="form-group">
			<label>Capa da Noticia:</label>
			<input type="file" name="capa">
			<input type="hidden" name="capa_atual" value="<?php echo $noticia['capa'] ?>">
		</div><!--form-group-->
		
		<div class="form-group">
			<input type="submit" name="act" value="Atualizar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->