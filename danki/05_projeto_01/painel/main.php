<!DOCTYPE html>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
			<!-- Google Fonts -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
		<!--  -->

		<title>Painel de Controle</title>

		<!-- Meta Tags -->
			<!-- UTF-8 -->
			<meta charset="utf-8">
			<!-- Responsivo -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- Author -->
			<meta name="author" content="Matheus Bespalec - matheusbespalec@gmail.com">
		<!--  -->
	<body>

		<?php

			if(isset($_GET['loggout'])){
				Painel::loggout();
				header('Location: '.INCLUDE_PATH_PAINEL);
			}

		?>


		<header class="left">
			<div class="container">

					<i class="fas fa-bars"></i>

				<a class="right" href="<?php echo INCLUDE_PATH_PAINEL.'?loggout' ?>"><i class="fas fa-sign-out-alt"> SAIR</i></a>

				<div class="clear"></div><!--clear-->

			</div><!--container-->
		</header>
		<div class="clear"></div><!--clear-->

		<section class="content left">
		<?php

			Painel::loadPage();

		?>
		</section><!--content-->

		<div class="clear"></div><!--clear-->
		<div class="menu left">
			<div class="wraper-menu">

				<section class="box-user">

					<div class="user-avatar">
						<?php 
							if($_SESSION['img'] == ''){ 
						?>
							<i class="fas fa-user"></i>
						<?php 
							}else{ 
						?>

							<img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img'];?>">

						<?php 
							} 
						?>

					</div><!--user-avatar-->
					<div class="user-ident">
						<h2><?php echo $_SESSION['nome']; ?></h2>
						<h3><?php echo getCargo($_SESSION['cargo']) ?></h3>
					</div><!--user-ident-->

				</section><!--box-user-->
				<section class="menu-list">
					<?php 
						function select(){
							echo '<i class="fas fa-angle-double-right"></i> ';
						}
						if(isset($_GET['url'])){
							$select = $_GET['url'];
						}else{
							$select = 'home'; 
						} 
					?>
					<h2>Home</h2>
					<a href="home" 
					<?php if($select == 'home'){echo 'class="select"';} ?>>
					<?php if($select == 'home'){select();} ?>Painel de Controle</a>

					<h2>Cadastro</h2>
					<a href="cadastrar-depoimento" 
					<?php if($select == 'cadastrar-depoimento'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-depoimento'){select();} ?>Cadastrar Depoimento</a>

					<a href="cadastrar-servico" 
					<?php if($select == 'cadastrar-servico'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-servico'){select();} ?>Cadastrar Serviço</a>

					<a href="cadastrar-slides" 
					<?php if($select == 'cadastrar-slides'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-slides'){select();} ?>Cadastrar Slides</a>


					<h2>Gestão</h2>
					<a href="listar-depoimento" 
					<?php if($select == 'listar-depoimento'){echo 'class="select"';} ?>>
					<?php if($select == 'listar-depoimento'){select();} ?>Listar Depoimento</a>

					<a href="listar-servico" 
					<?php if($select == 'listar-servico'){echo 'class="select"';} ?>>
					<?php if($select == 'listar-servico'){select();} ?>Listar Serviço</a>

					<a href="listar-slides" <?php if($select == 'listar-slides'){echo 'class="select"';} ?>>
					<?php if($select == 'listar-slides'){select();} ?>Listar Slides</a>


					<h2>Administração do Painel</h2>
					<a href="editar-usuario" 
					<?php if($select == 'editar-usuario'){echo 'class="select"';} ?>
					<?php Painel::permisionMenu(0); ?>>
					<?php if($select == 'editar-usuario'){select();} ?>
					Editar Usuário</a>

					<a href="adionar-usuarios" 
					<?php if($select == 'adionar-usuarios'){echo 'class="select"';} ?>
					<?php Painel::permisionMenu(2); ?>>
					<?php if($select == 'adionar-usuarios'){select();} ?>Adicionar Usuários</a>

					<h2>Configuração Geral</h2>
					<a href="editar" 
					<?php if($select == 'editar'){echo 'class="select"';} ?>>
					<?php if($select == 'editar'){select();} ?>Editar</a>

					<h2>Gestão de Notícias</h2>
					<a href="cadastrar-categorias" 
					<?php if($select == 'cadastrar-categorias'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-categorias'){select();} ?>Cadastar Categorias</a>

					<a href="gerenciar-categorias" 
					<?php if($select == 'gerenciar-categorias'){echo 'class="select"';} ?>>
					<?php if($select == 'gerenciar-categorias'){select();} ?>Gerenciar Categorias</a>

					<a href="cadastrar-noticias" 
					<?php if($select == 'cadastrar-noticias'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-noticias'){select();} ?>Cadastar Noticias</a>

					<a href="gerenciar-noticias" 
					<?php if($select == 'gerenciar-noticias'){echo 'class="select"';} ?>>
					<?php if($select == 'gerenciar-noticias'){select();} ?>Gerenciar Noticias</a>
				</section><!--menu-list-->

			</div><!--wraper-menu-->
		</div><!--menu-->

		<!-- SCRIPTS -->
		<script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>tinymce.init({selector:'.tinymce',height:300});</script>
		<!--  -->
	</body>
</html>