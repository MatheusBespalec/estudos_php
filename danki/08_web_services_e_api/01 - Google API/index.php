<?php

	$str = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=Via+do+conhecimento,km1,+Pato+Branco,PR&key=AIzaSyA4skd4W3Z731-OeYvgd_OdyDaMTqsa5qU');

	$endereco = json_decode($str);

	echo '<pre>';
		print_r($endereco);
	echo '</pre>';

?>