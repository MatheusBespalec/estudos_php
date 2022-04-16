<?php

	include('vendor/autoload.php');

	use FlyingLuscas\Correios\Client;
	use FlyingLuscas\Correios\Service;

	require 'vendor/autoload.php';

	$correios = new Client;

	//print_r($correios->zipcode()->find('09400-060'));

	print_r($correios->freight()
    ->origin('01001-000')
    ->destination('09400-060')
    ->services(Service::SEDEX, Service::PAC)
    ->item(16, 16, 16, .3, 1) // largura, altura, comprimento, peso e quantidade
    ->calculate());


?>