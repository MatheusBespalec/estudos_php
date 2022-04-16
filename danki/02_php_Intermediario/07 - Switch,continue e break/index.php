<?php

	$nome = 'João';

	switch($nome){
		case 'Matheus':
			echo 'Meu nome é '.$nome;
			break;
		case 'João':
			echo 'Meu nome é '.$nome;
			break;
	}

	echo '<br>';

	//Break sai de todo o Loop
	//Continue ignora o resto do Loop por uma rodada

	for($i = 1; $i <= 10; $i++){
		if($i == 5)
			continue; 
		
		echo $i;
		echo '<hr>';
	}

?>