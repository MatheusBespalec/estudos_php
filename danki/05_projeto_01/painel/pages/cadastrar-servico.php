<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

?>

<h2><i class="far fa-file-alt"></i> Cadastrar Serviço > </h2>
	<form method="post">
		<?php

			if (isset($_POST['act'])) {
				if(Painel::insert($_POST)){
					Painel::alert(true,'Serviço cadastrado com sucesso!');
				}else{
					Painel::alert(false,'Campos vazios não são permitidos!');
				}
			}

		?>

		<div class="form-group">
			<label>Descrição do Serviço:</label>
			<textarea name="servico" required></textarea>
		</div><!--form-group-->

		<input type="hidden" name="nome_tabela" value="tb_site.servico">
		<input type="hidden" name="order_id" value="0">
		
		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->