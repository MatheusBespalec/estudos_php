<?php

	class Principal{

		private $nome;
		private $idade;

		public function __construct($nome,$idade){
			$this->nome = $nome;
			$this->idade = $idade;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getIdade(){
			return $this->idade;
		}

	}

	$principal = new Principal('Matheus',18);
	echo $principal->getNome();
	echo $principal->getIdade();

?>