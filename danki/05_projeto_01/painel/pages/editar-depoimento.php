<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

?>

<h2><i class="far fa-file-alt"></i> Cadastrar Depoimento > </h2>
	<form method="post">
		<?php

			if (isset($_POST['act'])) {
				if(Painel::update($_POST)){
					Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimento');
				}else{
					Painel::alert(false,'Campos vazios não são permitidos!');
				}
			}

		?>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo Painel::selectItem('tb_site.depoimentos','nome',$_GET['id']) ?>" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Depoimento:</label>
			<textarea name="depoimento" value="depoimento" required><?php echo Painel::selectItem('tb_site.depoimentos','depoimento',$_GET['id']) ?></textarea>
		</div><!--form-group-->

		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<input type="hidden" name="nome_tabela" value="tb_site.depoimentos">

		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->