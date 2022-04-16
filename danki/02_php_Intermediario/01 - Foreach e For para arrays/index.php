<?php

	//Laços de Repetição com Array

	$arr = array('João','Felipe','Marcos','Paulo');
	//Podemos definir um nome para a chave assim:
	$arr['nome'] = 'Matheus';
	$arr['idade'] = '19';
	$arr['cidade'] = 'Ribeirão';

	//Ou na declaração do array que ficaria assim: $arr = array('Chave'=>'João');

	foreach($arr as $key => $value){
		echo $key;
		echo '=>';
		echo $value;
		echo '<hr>';
	}

	echo '<br><hr><hr><br>';

	//Como fazer com o for normal

	$vfor = array('São Paulo','Santo André','Mauá','São Bernardo','Curitiba');
	$count = count($vfor);
	//count é uma função nativa do PHP que conta o numero de elementos que temos dentro de uma variavel

	for($i = 0; $i < $count; $i++){
		echo $vfor[$i];
		echo '<br>';
	}

?>