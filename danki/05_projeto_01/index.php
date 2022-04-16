<!DOCTYPE html>
<?php 

	include('config.php'); 
	Site::updateUserOnline(); 
	Site::counter(); 

	$sql = MySql::conect()->prepare("SELECT * FROM `td_site.config`");
	$sql->execute();
	$site = $sql->fetch();

?>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>css/style.css">
			<!-- Google Fonts -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
		<!--  -->

		<title><?php echo $site['titulo']; ?></title>

		<!-- Meta Tags -->
			<!-- UTF-8 -->
			<meta charset="utf-8">
			<!-- Responsivo -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- SEO -->
			<meta name="keywords" content="" />
			<meta name="description" content="" />
			<meta name="author" content="Matheus Bespalec - matheusbespalec@gmail.com">
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<meta name="robots" content="index,follow">
		<!--  -->

		<!-- Icone -->
		<link rel="icon" href="<?php echo INCLUDE_PATH ?>favicon.ico" type="image/x-icon" />
	</head>
	<body>

		<div class="overlay-load"></div><!--overlay-load-->
		<img class="load" src="<?php INCLUDE_PATH ?>images/ajax-loader.gif">
		<div class="box-load">
			<div class="wraper-load">
				<i class="far fa-check-circle"></i>
				<!-- far fa-times-circle -->
				<p></p>
				<a>Ok!</a>
			</div>
		</div><!--box-load-->

		<header>
			<div class="container">

				<div class="logo">Logomarca</div><!--logo-->

				<nav class="desktop">
					<ul>
						<a href="<?php echo INCLUDE_PATH ?>home"><li>Home</li></a>
						<a href="<?php echo INCLUDE_PATH ?>sobre"><li>Sobre</li></a>
						<a href="<?php echo INCLUDE_PATH ?>servicos"><li>Serviços</li></a>
						<a href="<?php echo INCLUDE_PATH ?>contato"><li>Contato</li></a>
						<a href="<?php echo INCLUDE_PATH ?>noticias"><li>Noticias</li></a>
						<a href="<?php echo INCLUDE_PATH ?>painel/"><li>Login</li></a>
					</ul>
				</nav><!--desktop-->

				<nav class="mobile">
					<i class="fas fa-bars"></i>
					<ul>
						<a href="<?php echo INCLUDE_PATH ?>home"><li>Home</li></a>
						<a href="<?php echo INCLUDE_PATH ?>sobre"><li>Sobre</li></a>
						<a href="<?php echo INCLUDE_PATH ?>servicos"><li>Serviços</li></a>
						<a href="<?php echo INCLUDE_PATH ?>contato"><li>Contato</li></a>
						<a href="<?php echo INCLUDE_PATH ?>noticias"><li>Noticias</li></a>
						<a href="<?php echo INCLUDE_PATH ?>painel/"><li>Login</li></a>
					</ul>
				</nav><!--mobile-->

			</div><!--container-->
		</header>

		<?php echo '<base base="'.INCLUDE_PATH.'"/>'; ?>

		<?php 

			$url = isset($_GET['url']) ? $_GET['url'] : 'home';
			if($url == 'sobre' || $url == 'servicos') {
				echo '<target target="'.$url.'"/>';
				$url = 'home';
			}else if(explode('/', $url)[0] == 'noticias'){
				$url = 'noticias';
			}

			if(file_exists('pages/'.$url.'.php'))
				include('pages/'.$url.'.php');
			else
				include('pages/error404.php');

		?>

		<footer>
			<div class="container">
				<span>Matheus Bespalec - Todos os Direitos Reservados</span>
			</div><!--container-->
		</footer>

		<!-- Scripts -->
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/functions.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/slideFade.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/form.js"></script>
		<?php if (strstr($url, 'noticias') !== false) { ?>
			<script>
				$(function(){
					$('select').change(function(){
						location.href=include_path+'noticias/'+$(this).val();
					})
				})
			</script>
		<?php } ?>
		
		<!--  -->
	</body>
</html>