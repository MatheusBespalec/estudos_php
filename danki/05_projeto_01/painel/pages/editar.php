<div class="box-content w100">
<?php 
	
	Painel::permisionPage(0);
	$sql = MySql::conect()->prepare("SELECT * FROM `td_site.config`");
	$sql->execute();
	$site = $sql->fetch();

?>

<h2><i class="fas fa-edit"></i> Editar Usuário > </h2>
	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['act'])) {
				if(Painel::update($_POST,true)){
					$img = $_FILES['foto_autor'];
					$imgAtual = $site['foto_autor'];
					if(Painel::validImageSlide($img)){
						Painel::deleteFileConfig($imgAtual);
						$img = Painel::uploadImageConfig($img);
						$sql = Mysql::conect()->prepare("UPDATE `td_site.config` SET foto_autor = ?");
						$sql->execute(array($img));
					}else{
						Painel::alert(false,'Formato de imagem não é valido!');	
					}
					
					
				}else{
					Painel::alert(false,'Erro ao atualizar o site!');
				}

			}

		?>
		<input type="hidden" name="nome_tabela" value="td_site.config">

		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" name="titulo" value="<?php echo $site['titulo'];?>">
		</div><!--form-group-->

		<br>
		<hr>
		<br>

		<div class="form-group">
			<label>Autor:</label>
			<input type="text" name="autor" value="<?php echo $site['autor'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Foto do Autor:</label>
			<input type="file" name="foto_autor">
		</div><!--form-group-->

		<div class="form-group">
			<label>Paragrafo 1 sobre o autor:</label>
			<textarea name="a_paragrafo1"><?php echo $site['a_paragrafo1'];?></textarea>
		</div><!--form-group-->

		<div class="form-group">
			<label>Paragrafo 2 sobre o autor:</label>
			<textarea name="a_paragrafo2"><?php echo $site['a_paragrafo2'];?></textarea>
		</div><!--form-group-->

		<br>
		<hr>
		<br>
		<!-- Especialidades 1 -->

		<div class="form-group">
			<label>Especialidades 1 - Classe do Icone(Font-Awesome):</label>
			<input type="text" name="e1_ico" value="<?php echo $site['e1_ico'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Especialidades 1 - Titulo:</label>
			<input type="text" name="e1_titulo" value="<?php echo $site['e1_titulo'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Especialidades 1 - Descrição:</label>
			<textarea name="e1_desc"> <?php echo $site['e1_desc'];?></textarea>
		</div><!--form-group-->

		<br>
		<hr>
		<br>
		<!-- Especialidades 2 -->

		<div class="form-group">
			<label>Especialidades 2 - Classe do Icone(Font-Awesome):</label>
			<input type="text" name="e2_ico" value="<?php echo $site['e2_ico'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Especialidades 2 - Titulo:</label>
			<input type="text" name="e2_titulo" value="<?php echo $site['e2_titulo'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Especialidades 2 - Descrição:</label>
			<textarea name="e2_desc"> <?php echo $site['e2_desc'];?></textarea>
		</div><!--form-group-->

		<br>
		<hr>
		<br>
		<!-- Especialidades 3 -->

		<div class="form-group">
			<label>Especialidades 3 - Classe do Icone(Font-Awesome):</label>
			<input type="text" name="e3_ico" value="<?php echo $site['e3_ico'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Especialidades 3 - Titulo:</label>
			<input type="text" name="e3_titulo" value="<?php echo $site['e3_titulo'];?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Especialidades 3 - Descrição:</label>
			<textarea name="e3_desc"> <?php echo $site['e3_desc'];?></textarea>
		</div><!--form-group-->


		<!-- Submit -->
		<div class="form-group">
			<input type="submit" name="act" value="Atualizar!">
		</div><!--form-group-->

	</form>
</div><!--box-content-->