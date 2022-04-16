<?php

	include('vendor/autoload.php');

	use Carbon\Carbon;

	$data = Carbon::now()->addDay(85);;

	echo date('d-m-Y', strtotime($data));

?>