
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		Meu Conteudo!
		<?php

	ob_start();

?>
		teSTE
		<?php
			$conteudo = ob_get_contents();
			$lengt = ob_get_length();
			ob_clean();
			//echo $conteudo;
			echo $lengt;
		?>

		Meu Conteudo2!

	</body>
</html>

<?php
	ob_end_flush();
?>