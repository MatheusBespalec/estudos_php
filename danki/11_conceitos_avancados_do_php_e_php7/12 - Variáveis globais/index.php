<?php
	
	$nome = 'Matheus';
	function teste(){
		global $nome;
		echo $nome;
	}

	teste();

?>