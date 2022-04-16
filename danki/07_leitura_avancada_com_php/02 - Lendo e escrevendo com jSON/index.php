<?php
	//Criar JSON
	//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

	//Printar JSON
	//print_r(json_decode($json,true));
	//var_dump(json_decode($json, true));


	//Converter Array para JSON
	// $arr = ['nome'=>'Matheus','idade'=>19];

	// $json = json_encode($arr);

	// echo $json;

	

?>
<DOCTYPE html/>
<html>
<head></head>
<body>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(function(){
			$.ajax({
				url:'request.php',
				dataType: 'json'
			}).done(function(cliente){
				console.log(cliente.nome);
			})
		})
	</script>
</body>
</html>