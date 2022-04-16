<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

	if (!isset($_GET['id'])) {
		Painel::alert(false,'ID não especificado!');
		die();
	}

?>

<h2><i class="far fa-file-alt"></i> Cadastrar Depoimento > </h2>
	<form method="post">
		<?php

			if (isset($_POST['act'])) {
				$verifica = MySql::conect()->prepare("SELECT * FROM `tb_site.categoria` WHERE nome = ? AND id != ?");
				$verifica->execute([$_POST['nome'],$_GET['id']]);
				if ($verifica->rowCount() == 1) {
					Painel::alert(false,'Já existe uma categoria com esse nome!');
					}else{
					if(Painel::update($_POST)){
						Painel::alert(true,'Categoria Atualizada com sucesso!');
					}else{
						Painel::alert(false,'Campos vazios não são permitidos!');
					}
				}
			}

		?>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo Painel::selectItem('tb_site.categoria','nome',$_GET['id']) ?>" required>
		</div><!--form-group-->

		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<input type="hidden" name="nome_tabela" value="tb_site.categoria">

		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->