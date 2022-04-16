<?php

	function teste(){
		static $num = 0;
		$num+=2;
		return $num;
	}

	echo teste();
	echo '<br>';
	echo teste();
	
?>