<?php

	//Ler XML
	//$xml = simplexml_load_file('arquivo.xml');

	//Print XML Array
	// echo '<pre>';
	// print_r($xml);
	// echo '</pre>';

	//Print XML puxando Objeto
	// echo $xml->cliente->nome;
	// echo ' | ';
	// echo $xml->cliente->idade;
	
	//Declaração de Array para XML(conteudo troca de lugar com a chave)
	$teste = array(
		'Matheus'=>'Nome',
		19=>'Idade',
		'CEO'=>'Cargo'
	);

	function writeXML($arr,$nomeArquivo){
		$xml = new SimpleXMLElement('<dale/>');
		array_walk_recursive($arr ,array($xml,'addChild'));
		file_put_contents($nomeArquivo,$xml->asXML());
	}

	$content = writeXML($teste,'arquivo.xml');

	// Printando XML
	//echo $xml->Nome.' | '.$xml->Idade.' | '.$xml->Cargo;

	

?>
