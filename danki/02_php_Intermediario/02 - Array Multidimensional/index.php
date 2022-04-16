<?php

	//Array Multidimencionais
	$cliente['Nome'] = array('Pedrin','Paulin');
	$cliente['Idade'] = array('21','32');

	//Outras forma de declarar:  =$cliente = array(array('1','2'),array('Matheus','Paulo'));

	echo 'Informações dos Clientes:<br>';

	foreach($cliente as $key => $value){
		echo $value[0];
		echo '<br>';
		echo $value[1];
		echo '<hr>';
	}
?>