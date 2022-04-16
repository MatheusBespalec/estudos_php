<?php

	//Factory Design Patterns

	class Cachorro{

		public function __construct(){
			echo 'Classe Cachorro';
		}

	}

	class Gato{

		public function __construct(){
			echo 'Classe Gato';
		}

	}

	class Animal{

		public static function build($minhaClasse){
			if(class_exists($minhaClasse))
				return new $minhaClasse;
		}

	}

	Animal::build('Cachorro');

	echo '<hr>';

	//Facade Design Pattern

	class Carrinho{
		public function fecharCarrinho(){
			echo 'Carrinho fechado';
			echo '<br>';
		}
	}

	class Frete{
		public function calcularFrete(){
			echo 'Frete Calculado';
			echo '<br>';
		}
	}

	class Pedido{
		public function fecharPedido(){
			echo 'Pedido Fechado';
			echo '<br>';
		}
	}

	class Loja{

		public function fecharCompra(){
			$this->carrinho();
			$this->frete();
			$this->pedido();
		}

		public function carrinho(){
			$carrinho = new Carrinho;
			$carrinho->fecharCarrinho();
		}

		public function frete(){
			$frete = new Frete;
			$frete->calcularFrete();
		}


		public function pedido(){
			$pedido = new Pedido;
			$pedido->fecharPedido();
		}


	}

	$loja = new Loja;
	$loja->fecharCompra();

?>