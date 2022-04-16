$(function(){
	$('body').on('submit','form.ajax',function(){
		var form = $(this);

		$.ajax({
			beforeSend:function(){
				$('.overlay-load').fadeIn();
				$('img.load').fadeIn();
				$('.box-load').fadeIn();
			},
			url:include_path+'ajax/form.php',
			method:'POST',
			dataType:'json',
			data:form.serialize()
		}).done(function(data){
			if (data['resultado'] == true) {
				$('.wraper-load').fadeIn();
				$('.wraper-load p').html(data['mensagem']);
				$('img.load').fadeOut();
				$("input[type=text], input[type=email], textarea").val("");
			}else{
				$('.wraper-load').fadeIn();
				$('.wraper-load p').html(data['mensagem'])
				$('.wraper-load i').removeClass('far fa-check-circle');
				$('.wraper-load i').addClass('far fa-times-circle');
				$('far fa-times-circle').css('color','#f53333');
			}
		});
		return false;
	})
	
	$('body').on('click','.wraper-load a', function(){
		$('.overlay-load').fadeOut();
		$('.box-load').fadeOut();
	})
})