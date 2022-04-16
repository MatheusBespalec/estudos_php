<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

?>

<h2><i class="far fa-image"></i> Cadastrar Noticia > </h2>
	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['act'])) {
				$verifica = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?");
				$verifica->execute([$_POST['titulo']]);
				if ($verifica->rowCount() == 1) {
					Painel::alert(false,'Já existe um titulo com esse nome!');
				}else{
					$titulo = $_POST['titulo'];
					$conteudo = $_POST['conteudo'];
					$categoria = $_POST['categoria_id'];
					$tabela = $_POST['nome_tabela'];
					$capa = $_FILES['capa'];
					if ($titulo == '' || $conteudo == '' || $categoria == '') {
						Painel::alert(false,'Campos vazios não são permitidos!');
					}else if($capa['tmp_name'] == ''){
						Painel::alert(false,'Selecione uma imagem!');
					}else{
						if(Painel::validImage($capa)) {
							$capa = Painel::uploadImage($capa);
							$arr = ['nome_tabela'=>'tb_site.noticias',$categoria,date('Y-m-d'),$titulo,$conteudo,$capa,'order_id'=>'0'];
							if(Painel::insert($arr)){
								Painel::alert(true,'Noticia cadastrada com sucesso!');
							}else{
								Painel::alert(false,'Erro ao cadastrar noticia!');
							}
						}else{
							Painel::alert(false,'Formato de imagem invalido!');
						}
					}
				}
			}

		?>

		<div class="form-group">
			<label>Categoria:</label>
			<select name="categoria_id">
				<?php 
					$categoria = Painel::listTable('tb_site.categoria');
					foreach ($categoria as $key => $value) {		
				?>
						<option value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
				<?php	
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Capa da Noticia:</label>
			<input type="file" name="capa">
		</div><!--form-group-->

		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" name="titulo">
		</div><!--form-group-->

		<div class="form-group">
			<label>Conteudo:</label>
			<textarea class="tinymce" name="conteudo"></textarea>
		</div><!--form-group-->

		<input type="hidden" name="nome_tabela" value="tb_site.noticias">
		<input type="hidden" name="order_id" value="0">

		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->