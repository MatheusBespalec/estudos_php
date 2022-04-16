<?php
	$nome = 'Matheus';
	$func = function() use ($nome){
		echo $nome;
	};
	
	$func();

?>