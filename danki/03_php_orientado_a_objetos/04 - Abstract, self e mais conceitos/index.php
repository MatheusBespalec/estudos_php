<?php

	abstract class Teste{

		public function testando(){
			echo 'testando';
		}

		public static function ola(){
			echo '<br>';
			echo 'ola';
			echo '<br>';
		}

		abstract function tchal();

	}

	class Principal extends Teste{

		public function tchal(){
			//Chama Metodos estaticos dentro da classe
			self::ola();
			echo 'teste2';
		}

		public function tes1(){
			echo 'testado';
			echo '<br>';
			$this->testando();
		}

	}

		class Principal2{

		public function dale(){
			Teste::ola();
			echo 'teste2';
		}

	}

	// $teste = new Principal;
	// $teste->tes1();
	// $teste->tchal();

	$teste = new Principal2;
	$teste->dale();

?>