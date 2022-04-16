		<section class="banner">

			<!-- Conteudo Slide -->
			<?php 
				$slide = Site::getData('tb_site.slide');
				foreach ($slide as $key => $value) {
				echo '<div class="img-slide" style="background-image: url(\''.INCLUDE_PATH.'images/slides/'.$value['img'].'\');"></div><!--img-slide-->';
				} 
			?>

			<div class="overlay"></div><!--overlay-->

			<div class="bullets">
			</div><!--bullets-->
			<!--  -->

			<div class="container">
				<form method="post">
					<h2>Qual o seu melhor e-mail?</h2>
					<input type="text" name="email" >
					<input type="hidden" name="identificador" value="form_email">
					<input type="submit" name="act" value="Cadastrar">
				</form>
			</div><!--container-->

		</section><!--banner-->

		<section id="sobre" class="sobre">
			<div class="container">

				<div class="w50">
					<h2><?php echo $site['autor'];?></h2>
					<p>
						<?php echo $site['a_paragrafo1'];?>
					</p>
					<p>
						<?php echo $site['a_paragrafo2'];?>
					</p>
				</div><!--w50-->

				<div class="w50">
					<img src="<?php echo INCLUDE_PATH.'images/'.$site['foto_autor']; ?>">
				</div><!--w50-->

			</div><!--container-->
		</section><!--author-->

		<section class="especialidades">
			<div class="container">
				<h2>Especialidades</h2>
				<div class="flex-center">

					<div class="w30">
						<i class="<?php echo $site['e1_ico']; ?>"></i>
						<h3><?php echo $site['e1_titulo']; ?></h3>
						<p><?php echo $site['e1_desc']; ?></p>
					</div><!--box-->

					<div class="w30">
						<i class="<?php echo $site['e2_ico']; ?>"></i>
						<h3><?php echo $site['e2_titulo']; ?></h3>
						<p><p><?php echo $site['e2_desc']; ?></p></p>
					</div><!--box-->

					<div class="w30">
						<i class="<?php echo $site['e3_ico']; ?>"></i>
						<h3><?php echo $site['e3_titulo']; ?></h3>
						<p><p><?php echo $site['e3_desc']; ?></p></p>
					</div><!--box-->

				</div><!--flex-3-->
			</div><!--container-->
		</section><!--especialidades-->

		<section class="extras">
			<div class="container">
				
				<div class="w50">
					<h2>Depoimento dos nossos clientes</h2>
					
					<?php 
						$depoimento = Site::getData('tb_site.depoimentos');
						foreach ($depoimento as $key => $value) {
							echo '<div class="dep">';
							echo '<p>'.$value['depoimento'].'</p>';
							echo '<h3>"'.$value['nome'].'"</h3>';
							echo '</div><!--dep-->';
							echo '<div class="line"></div><!--line-->';
						} 
					?>

				</div><!--w50-->

				<div id="servicos" class="w50">
					<h2>Serviços</h2>
					<ul>
						<?php 
							$servico = Site::getData('tb_site.servico');
							foreach ($servico as $key => $value) {
							echo '<li>'.$value['servico'].'</li>';
						} ?>
					</ul>
				</div><!--w50-->

			</div><!--container-->
		</section><!--extras-->