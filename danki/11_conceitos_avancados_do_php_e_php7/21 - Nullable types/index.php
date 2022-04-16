<?php

	function teste():?string{
		return 9;
	}

	function teste2(?string $numero){
		return $numero;
	}

	var_dump(teste2(10));

?>