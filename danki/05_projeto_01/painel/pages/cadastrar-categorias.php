<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

?>

<h2><i class="far fa-file-alt"></i> Cadastrar Categoria > </h2>
	<form method="post">
		<?php

			if (isset($_POST['act'])) {

				if($_POST['categoria'] == ''){
					Painel::alert(false,'Campos vazios não são permitidos!');
				}else{
					$verifica = MySql::conect()->prepare("SELECT * FROM `tb_site.categoria` WHERE nome = ?");
					$verifica->execute([$_POST['categoria']]);
					if ($verifica->rowCount() == 1) {
							Painel::alert(false,'Já existe uma categoria com esse nome!');
					}else{
						$slug = Painel::generateSlug($_POST['categoria']);
						if(Painel::insert(['nome'=>$_POST['categoria'],'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categoria'])){
							Painel::alert(true,'Categoria cadastrado com sucesso!');
						}else{
							Painel::alert(false,'Erro ao cadastrar categoria!');
						}
					}
				}
			}

		?>

		<div class="form-group">
			<label>Nome da Categoria:</label>
			<input type="text" name="categoria" />
		</div><!--form-group-->
		
		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->