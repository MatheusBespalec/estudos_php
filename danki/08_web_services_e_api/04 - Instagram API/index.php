<?php
	
	include('vendor/autoload.php');

	use MetzWeb\Instagram\Instagram;

	$instagram = new Instagram(array(
		'apiKey'      => '539536600640345',
		'apiSecret'   => 'b5f8ae0c3619c8552600b3cc41556fd6',
		'apiCallback' => 'http://localhost/Back-End/08%20-%20Web%20Services%20e%20API/04%20-%20Instagram%20API/'
	));

	echo "<a href='{$instagram->getLoginUrl()}'>Login with Instagram</a>";

	$code = $_GET['code'];
	$data = $instagram->getOAuthToken($code);

	echo 'Seu nome é: ' . $data->user->username;
	echo '<br>';

	$instagram->setAccessToken($data);

	// get all user likes
	$likes = $instagram->getUserLikes();

	// take a look at the API response
	echo '<pre>';
	print_r($likes);
	echo '<pre>';

?>