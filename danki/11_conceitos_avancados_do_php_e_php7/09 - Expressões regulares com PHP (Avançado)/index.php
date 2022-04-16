	
<?php
	$str = file_get_contents('https://cursos.dankicode.com');
	preg_match_all('/class="(.*?)"/s', $str, $matches);

	echo '<pre>';
	print_r($matches);
	echo '</pre>';

?>