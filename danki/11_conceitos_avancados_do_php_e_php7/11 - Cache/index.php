<?php

	include('Cache.php');

	$cache = new Cache;
	echo $cache->readCache()->conteudo;

?>