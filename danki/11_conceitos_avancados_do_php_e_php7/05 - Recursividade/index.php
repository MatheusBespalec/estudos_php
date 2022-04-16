<?php

	Teste();
	function Teste(){
		static $i = 0;
		$i++;
		if ($i < 3) {
			echo 'Chamando Teste';
			Teste();
		}
	}

?>