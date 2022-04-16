<?php

	class Teste{

		public function printMessage($msg){
			$msg->showMessage();
		}

	}

	$teste = new Teste;
	$teste->printMessage(new Class{
		public function showMessage(){
			echo 'Olá Mundo!';
		}
	});

?>