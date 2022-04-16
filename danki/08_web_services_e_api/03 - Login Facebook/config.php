<?php

	session_start();

	include('vendor/autoload.php');

	use Facebook\Facebook;

	$redirectUrl = 'http://localhost/Back-End/08%20-%20Web%20Services%20e%20API/03%20-%20Login%20Facebook/';
	$fbPermission = ['email'];

	$fb = new \Facebook\Facebook([
	  'app_id' => '1444386915945382',
	  'app_secret' => 'c1124a3afab9c0c0bbbbdd9d76892d31',
	  'default_graph_version' => 'v2.10',
	  //'default_access_token' => '{access-token}', // optional
	]);

	$helper = $fb->getRedirectLoginHelper();

	try{
		if (isset($_SESSION['facebook_access_token'])) {
			$accessToken = $_SESSION['facebook_access_token'];
		}else{
			$accessToken = $helper->getAccessToken();
		}
	}catch(FacebookResponseException $e){}

?>