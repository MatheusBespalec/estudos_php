$(function(){

	$('.ajax').ajaxForm({
		dataType: 'json',
		beforeSend: function(){
			$('.ajax').animate({'opacity':'0.4'});
			$('.ajax').find('input').attr('disabled','true');
			$('.ajax').find('select').attr('disabled','true');
		},
		success: function(data){
			$('.ajax').animate({'opacity':'1'});
			$('.ajax').find('input').removeAttr('disabled');
			$('.ajax').find('select').removeAttr('disabled');
			$('.alert').remove();
			$('.ajax').prepend('<div class="alert '+data['tipo']+'">'+data['mensagem']+'</div>');
			if(data['tipo'] == 'sucesso')
				$('.ajax')[0].reset();
		}
	})

})