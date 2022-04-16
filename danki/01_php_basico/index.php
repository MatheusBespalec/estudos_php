<?php

	// Print na tela
	 	//echo 'Olá Mundo!';

	// Declaração de Variaveis SERVER
		// echo '<br>';
		// echo $_SERVER['SCRIPT_FILENAME'];

	// Todas as Variaveis Server
		// echo '<pre>';
		// print_r($_SERVER);
		// echo '</pre>';

	//Criar Variavel

		// $nome = 'Matheus';
		// echo $nome;

	//Concatenação(juntar)
	
		// $nome = 'Matheus';
		// echo "Meu nome é ".$nome;

	//Tipos de Variaveis

		//Boolean
			// $bool = true;
			// $dale = false;
			// echo 'Boolean True: '.$bool; //Aparece o numero 1
			// echo "<br>";
			// echo 'Boolean False: '.$dale; //Não aparece nada
		
		//String
			// $nome = 'Matheus';
			// echo $nome;
		
		//Inteiros
			// $num = 22;
			// echo $num;

		//Double(numeros fracionados/quebrados)
			// $double = 22.23;
			// echo $double;

	//Constantes Define
		//O nome da constante deve estar em letras maiusculas

		// define('NOME', 'Matheus');
		// echo NOME;

	// Arrays
		//Declaração Comum
			// $nome = array('Matheus','João','Guilherme');
			// echo $nome[1];

		//Declaração especifica por numero
			// $nome = array('Matheus','João','Guilherme');
			// $nome[100] = 'Felipe';
			// echo $nome[100];

		//Declaração especifica por nome
			// $cliente['nome'] = 'Guilherme';
			// $cliente['idade'] = '23';
			// $cliente['cidade'] = 'São Paulo';

			// echo $cliente['nome'].$cliente['idade'].$cliente['cidade'];

	//Aspas
	
		/* Em algumas situações não podemos usar aspas duplas("")*/
		//EX:

			//echo "<div class="teste">Olá Mundo!</div>"

		/* Como podemos ver ao inserirmos aspas duplas dentro de aspas duplas o echo seria fechado e seria necessario
		concatenar para continuar, porém temos outra solução antes de colocar as aspas acrecentamos uma contra-barra(\) como
		no exemplo abaixo*/

			//echo "<div class=\"teste\">Olá Mundo!</div>"

	//Operadores

		/*
		
			'=' > Recebe o valor Ex: $nome = 'Matheus' | a variavel $nome recebe o valor 'Matheus'

			'==' > Igual, podemos comparar se um valor é igual a outro Ex: if($num1 == $num2)

			'===' > Identico, podemos comparar para vermos se o valor é identico 
			Ex:
			$teste = 10;
			$teste2 = '10'

			Os valores são iguais porém não são identicos ja que uma varievel é do tipo inteiro e a outra uma String

			'!=' Diferente, podemos comparar se um valor é diferente a outro Ex: if($num1 !== $num2)

			'!==' Não identico, podemos ver se os valores não são identicos 
			Ex: 
			$num1 = 10;
			$num1 = '10'

			Comparando os valores teriamos valores igual porem não não identicos pois se diferem pelo tipo
		*/

	//Operadores Matemáticos

		/*
			> Maior

			< Menor

			>= Maior ou Igual

			<= Maior ou Igual
		*/

	//Estruturas de Repetição

		// for($counter = 0; $counter < 5; $counter++){
		// 	echo 'Ola Mundo!';
		// }

		//Neste precisamos declarar a variavel antes

		// $counter = 0;	
		// while($counter < 5){
		// 	echo 'Ola Mundo!';
		// 	echo '<br>';
		// 	$counter++;
		// }

		//Neste ainda precisamos declarar a variavel antes e nele executamos o código antes da verificação
			
		// $counter = 0;
		// do{
		// 	echo 'Ola Mundo!';
		// 	echo '<br>';
		// 	$counter++;
		// }while($counter = 0)

?>