<div class="box-content w100">
<?php 
	
	Painel::permisionPage(1);

?>

<h2><i class="far fa-image"></i> Cadastrar Slide > </h2>
	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['act'])) {
				if(Painel::validImageSlide($_FILES['image'])) {
					$img = $_FILES['image'];
					$img = Painel::uploadImageSlide($img);
					if(Painel::imageExists($img)){
						$arr = ['nome_tabela'=>'tb_site.slide',$img,'order_id'=>'0'];
						if(Painel::insert($arr)){
							Painel::alert(true,'Imagem cadastrado com sucesso no slide!');
						}else{
							Painel::alert(false,'Erro ao cadastrar imagem!');
						}
					}else{
						Painel::alert(false,'Imagem já cadastrada, selecione outra!');
					}
				}else{
					Painel::alert(false,'Formato de Imagem Invalido!');
				}
			}

		?>
		<div class="form-group">
			<label>Selecione uma Imagem:</label>
			<?php unset($_FILES['image']);?>
			<input type="file" name="image" required>
		</div><!--form-group-->

		<input type="hidden" name="nome_tabela" value="tb_site.slide">

		<div class="form-group">
			<input type="submit" name="act" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->