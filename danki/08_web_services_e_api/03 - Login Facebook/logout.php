<?php
	
	include('config.php');
	unset($_SESSION['userData']);
	unset($_SESSION['facebook_access_token']);
	session_destroy();
	header('Location: index.php');

?>