$(function(){

	$('[name=cpf]').mask('000.000.000-00');
	$('[name=cnpj]').mask('00.000.000/0000-00');

	$('[name=tipo]').change(function(){
		var val = $(this).val();
		if(val == 'fisico'){
			$('[rel=cnpj]').hide();
			$('[rel=cpf]').show();
		}else if(val == 'juridico'){
			$('[rel=cnpj]').show();
			$('[rel=cpf]').hide();
		}
	})

})