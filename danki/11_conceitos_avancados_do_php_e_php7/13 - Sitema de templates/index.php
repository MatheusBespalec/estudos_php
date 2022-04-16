<?php

	include('Template.php');

	$template = new Template;
	$template->render(['titulo'=>'Meu Titulo','nome'=>'Matheus'],'site.html');

?>