<!DOCTYPE html>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>css/style.css">
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
				header('Location: '.INCLUDE_PATH);
			}

		?>


		<header class="left">
			<div class="container">

					<i class="fas fa-bars"></i>

				<a class="right" href="<?php echo INCLUDE_PATH.'?loggout' ?>"><i class="fas fa-sign-out-alt"> SAIR</i></a>

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

							<img src="<?php echo INCLUDE_PATH; ?>uploads/<?php echo $_SESSION['img'];?>">

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

					<h2>Gestão de Clientes</h2>
					<a href="cadastrar-cliente" 
					<?php if($select == 'cadastrar-cliente'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-cliente'){select();} ?>Cadastrar Cliente</a>
					<a href="lista-de-clientes" 
					<?php if($select == 'lista-de-clientes'){echo 'class="select"';} ?>>
					<?php if($select == 'lista-de-clientes'){select();} ?>Lista de Clientes</a>

					<h2>Controle de Estoque</h2>
					<a href="cadastrar-produto" 
					<?php if($select == 'cadastrar-produto'){echo 'class="select"';} ?>>
					<?php if($select == 'cadastrar-produto'){select();} ?>Cadastrar Produto</a>
				</section><!--menu-list-->

			</div><!--wraper-menu-->
		</div><!--menu-->

		<!-- SCRIPTS -->
		<script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.ajax.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/ajax.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/main.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.mask.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/helperMask.js"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>tinymce.init({selector:'.tinymce',height:300});</script>
		<!--  -->
	</body>
</html>