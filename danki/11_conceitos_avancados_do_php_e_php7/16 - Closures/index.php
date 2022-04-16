<?php

	class Teste{

		public function sendMessage($func){
			if($func instanceof Closure){
				$func = $func->bindTo($this);
				$func();
			}else{
				echo 'teste';
			}
			
		}

		public function printMessage(){
			echo 'Printando a mensagem!';
		}

	}

	$teste = new Teste;
	$teste->sendMessage(function(){
		$this->printMessage();
	});

?>