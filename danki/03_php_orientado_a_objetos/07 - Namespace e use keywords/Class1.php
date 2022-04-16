<?php

	namespace Sessao1;

	class Classe1{

		public function __construct(){
			echo 'Classe 1 Instanciada';
			echo '<br>';
			//Como estamos usando namespace e o diretorio da classe 2 não tem um namespace ele esta no diretório geral, assim só precisamos colocar uma '\' para indicar isso
			new \Classe2;
		}

	}

?>