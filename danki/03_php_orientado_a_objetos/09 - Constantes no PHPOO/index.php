<?php
//Constante no PHPOO 
	class minhaClasse{
		//Modo de declarar
		const NUM = 20;

		public function __construct(){
			// Como puxar dentro da classe
			 echo self::NUM;
		}
	}
	//Puxando fora da Classe
	echo minhaClasse::NUM;
?>