<?php

	if (!isset(explode('/',$_GET['url'])[2])) {

		if (isset(explode('/',$_GET['url'])[1])) {
			$categoria =explode('/',$_GET['url'])[1];
			$sql = MySql::conect()->prepare("SELECT * FROM `tb_site.categoria` WHERE slug = ?");
			$sql->execute([$categoria]);
			$categoria = $sql->fetch();
		}else{
			$categoria = '';
		}

		// Paginação
		$perPage = 2;

		if(@$_GET['pagina'] == null)
			$currentPage = 1;
		else
			$currentPage = (int)$_GET['pagina'];

?>

<section class="inscrever">
	<h2><i class="far fa-bell"></i></h2>
	<h2>Acompanhe as ultimas <span>Noticias do Portal</span></h2>
</section><!--inscrever-->

<section class="portal">
	<div class="container">
		<aside>
			<div class="portal-busca">
				<form method="post">
					<label><i class="fas fa-search"></i> Realizar uma busca:</label>
					<input type="text" name="busca" placeholder="O que deseja procurar?">
					<input type="submit" value="Pesquisar!">
				</form>
			</div><!--portal-busca-->

			<div class="portal-categoria">
				<form>
					<label><i class="fas fa-list"></i> Categoria:</label>
					<select>
						<option selected >Todos</option>
						<?php 
							$categorias = MySql::conect()->prepare("SELECT * FROM `tb_site.categoria`");
							$categorias->execute();
							$categorias = $categorias->fetchAll();
							foreach ($categorias as $key => $value) { 
						?>
							<option <?php if($value['slug'] == @$categoria['slug']){echo 'selected';} ?> value="<?php echo $value['slug']; ?>"><?php echo $value['nome']; ?></option>
						<?php 
							}
						?>
					</select>
				</form>
			</div><!--portal-busca-->

			<div class="portal-author">
				<h2><i class="fas fa-user"></i> Autor:</h2>
				<div class="img-author">
					<img src="<?php echo INCLUDE_PATH; ?>images/foto.jpg">
				</div><!--img-author-->

				<div class="desc-author">
					<h2>Matheus Bespalec:</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nulla diam, pulvinar nec semper ac, aliquet a ipsum. Phasellus nec bibendum dui. Sed sagittis rhoncus turpis nec ornare. 
					</p>
				</div><!--img-author-->
			</div><!--portal-busca-->
		</aside>

		<div class="portal-noticias">
			<?php if(isset($_POST['busca'])){ 
					$busca = $_POST['busca'];
					if(isset($categoria['id'])){
						$id =  @$categoria['id'];
						$noticias = Painel::paginationWhere('tb_site.noticias',"categoria_id = $id AND titulo LIKE '%$busca%' ",($currentPage - 1)*$perPage,$perPage);
						$pagination = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = $id AND titulo LIKE '%$busca%' ");
					}else{
						$noticias = Painel::paginationWhere('tb_site.noticias','titulo LIKE \'%'.$busca.'%\'',($currentPage - 1)*$perPage,$perPage);
						$pagination = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo LIKE '%$busca%' ");
					}
					
					
					$pagination->execute();
					$pagination = $pagination->fetchAll();
				?>
				<h2>Busca Realizada com Sucesso!</h2>

			<?php }else if(@$categoria['nome'] == ''){ 
					$id =  @$categoria['id'];
					$noticias = Painel::pagination('tb_site.noticias',($currentPage - 1)*$perPage,$perPage);
					$pagination = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias`");
					$pagination->execute();
					$pagination = $pagination->fetchAll();
				?>
				<h2>Visializando Todos os Posts</h2>
			<?php }else{ 
					$id =  $categoria['id'];
					$noticias = Painel::paginationWhere('tb_site.noticias','categoria_id = '.$categoria['id'],($currentPage - 1)*$perPage,$perPage);
					$pagination = MySql::conect()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id= $id");
					$pagination->execute();
					$pagination = $pagination->fetchAll();
				?>
				<h2>Visializando Posts em <span><?php echo $categoria['nome']; ?></span></h2>
			<?php } ?>
			<?php foreach ($noticias as $key => $value) { ?>
				<div class="noticia-single">
					<h2><?php echo implode('/',array_reverse(explode('-',$value['data']))); ?> - <?php echo $value['titulo']; ?></h2>
					<?php echo substr($value['conteudo'], 0,500).'...'; ?>
					<br>
					<a href="<?php echo INCLUDE_PATH; ?>noticias/categoria/titulo">Leia Mais!</a>
				</div><!--noticia-single-->
			<?php } ?>
			<?php 

			$numDep = count($pagination);
			$numPages = ceil($numDep/$perPage);	

			if($numPages > 1){

			?>
			<div class="pagination">
				<?php 

					for ($i = 0; $i < $numPages; $i++) {
						$num = $i+1;
						if($num == $currentPage)
							echo '<a class="select-page" href="?pagina='.$num.'">'.$num.'</a>';
						else
							echo '<a href="?pagina='.$num.'">'.$num.'</a>';
					}

				?>
			</div><!--pagination-->
		<?php } ?>
		</div><!--portal-noticias-->
	</div><!--container-->
</section><!--portal-->

<?php 
	}else{
		include('noticia-single.php');
	}
?>