<?php 

	if (isset($_POST['request'])) {
		$noticias = array(
			'titulo'=>array('Titulo Noticia 1','Titulo Noticia 2'),
			'conteudo'=>array('Conteudo Noticia 1','Conteudo Noticia 2')
		);

		die(json_encode($noticias));
	}
	
?>