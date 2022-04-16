<?php

	include('interface.php');

	class Teste implements Interface1{

		public function Hello($nome){
			echo "Helo $nome";
		}

	}

	$teste = new Teste;
	$teste->Hello('Matheus');

?>