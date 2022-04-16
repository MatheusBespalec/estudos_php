<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $arr['titulo'];?></title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_FULL; ?>css/style.css">
		<meta charset="utf-8">
	</head>
	<body>
		<header>
			<div class="container">
				<div class="logomarca"><h1>Logomarca</h1></div><!--Logomarca-->

				<nav class="desktop">
					<?php foreach ($this->menu as $key => $value) {?>
						<li><a href="<?php echo INCLUDE_PATH.strtolower($value); ?>"><?php echo $value; ?></a></li>
					<?php } ?>
				</nav><!--desktop-->
			</div><!--container-->
		</header>
