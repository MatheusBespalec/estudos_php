<?php

	$func = function(){
		echo 'ola mundo!';
	};

	$func();

	echo '<br>';

	function one(){
		function two(){
			echo 'Hello World!';
		}
		two();
	}

	call_user_func('one');

	echo '<br>';

	if(is_callable('one')){
		echo 'é uma função';
	}


?>