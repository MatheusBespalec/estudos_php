<?php
	

	//Verificar se existe:
	if (is_dir('pasta')) {
		echo "A pasta existe";
	}else{
		//Criar pasta:
		mkdir('pasta');
		echo "A pasta foi criada";
	}

	//Deletar pasta
	//rmdir('pasta');
	$pasta = opendir('pasta');
	$el = 0;
	// while ($file = readdir($pasta)) {
	// 	$el+=1;
	// 	if ($file == '.' || $file == '..') {
	// 		continue;
	// 	}
		
	// 	echo'<br>';
	// 	echo $file;

	// }
	$file = readdir($pasta);
	foreach ($file as $key => $value) {
		echo $value;
	}
	echo'<br>';
	echo $el;
	closedir($pasta);

?>