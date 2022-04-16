<?php

	include('config.php');

	if (isset($accessToken)) {
		
		if (isset($_SESSION['facebook_access_token'])) {
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
		}else{
			$_SESSION['facebook_access_token'] = (string)$accessToken;
			$oAuth2Client = $fb->getOAuth2Client();
			$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
			$_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
		}

		if(isset($_GET['code']))
			header('Location: ./');

		try{
			$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
			$fbUserProfile = $profileRequest->getGraphNode()->asArray();
		}catch(FacebookResponseException $e){}

		$fbUserData = [
			'oauth_provider'=>'facebook',
			'id'=>$fbUserProfile['id'],
			'first_name'=>$fbUserProfile['first_name'],
			'last_name'=>$fbUserProfile['last_name']
		];

		$userData = $fbUserData;

		$_SESSION['userData'] = $fbUserData;

		$logoutUrl = $helper->getLogoutUrl($accessToken,$redirectUrl.'logout.php');

		if(!empty($userData)){
			// $output = '';
			// $output.= "Nome: $userData[first_name]";
			// $output.= "Sobrenome: $userData[last_name]";
			echo '<pre>';
			print_r($fbUserProfile);
			echo '</pre>';
			$output = "<br><a href=\"$logoutUrl\">Logout</a>";
		}else{
			$output = '<h1>Ocorreu um erro!</h1>';
		}

	}else{
		$loginUrl = $helper->getLoginUrl($redirectUrl ,$fbPermission);
		$output = '<a href="'.$loginUrl.'">Entrar com Facebook</a>';
	}

	echo $output;

?>