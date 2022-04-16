<?php

	class Pai{

		public function olaPai(){
			echo 'Ola da Classe Pai';
		}

		//Com a classe protected eu posso chamar ela em outras classes com a herança dessa
		protected function tchal(){
			echo 'tchal';
		}

		public function teste(){
			echo 'teste';
		}

	}

	class Filha extends Pai{

		public function teste(){
			//Quando eu chamo esta funçando tendo outra igual na Pai essa reescreve a outra, para chamar a do Pai utilizamos o 'parent::'
			parent::teste();
			echo 'teste2';
		}

		public function olaFilha(){
			echo 'Ola da classe Filha';
		}

	}

	$pai = new Pai;
	// $pai->olaPai();

	$filha = new Filha;
	$filha->teste();

?>