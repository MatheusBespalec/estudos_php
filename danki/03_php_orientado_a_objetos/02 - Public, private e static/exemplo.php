<?php

	class Cliente{
		private $nome;
		private $idade;

		public static $status = 'Cliente';

		public function setNome($nome){
			$this->nome = $nome;
			echo $this->nome;
			echo '<br>';
		}

		public function setIdade($idade){
			$this->idade = $idade;
			echo $this->idade;
			echo '<br>';
		}

		public static function frase(){
			echo '<br>';
			echo 'teste';
		}
	}

?>