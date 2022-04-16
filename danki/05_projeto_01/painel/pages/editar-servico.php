<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

?>

<h2><i class="far fa-file-alt"></i> Editar Serviço > </h2>
	<form method="post">
		<?php

			if (isset($_POST['act'])) {
				if(Painel::update($_POST)){
					Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servico');
				}else{
					Painel::alert(false,'Campos vazios não são permitidos!');
				}
			}

		?>

		<div class="form-group">
			<label>Descrição do Serviço:</label>
			<textarea name="servico" required><?php echo Painel::selectItem('tb_site.servico','servico',$_GET['id']) ?></textarea>
		</div><!--form-group-->

		<input type="hidden" name="nome_tabela" value="tb_site.servico">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		
		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->