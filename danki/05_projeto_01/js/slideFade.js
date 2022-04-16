$(function(){
	//Slider FadeIn FadeOut

	//Parametros
	var delay = 5; //Em Segundos
	var index = 0;
	var maxSlide = $('.img-slide').length;
	var el = $('.img-slide');

	//Inicia Slide
	function initSlide(){
		//Mostrar Primeiro Slide
		el.eq(0).show();

		//Colocando controles Automaticamente
		var content = $('.bullets').html();
		for (var i = 0; i < maxSlide; i++) {
			if(i == 0){
				content+='<span class="slide-ativo"></span>';
			}else{
				content+='<span></span>';
			}
			$('.bullets').html(content);
		}
	}

	//Animaçõs do Slide
	function changeSlide(){
		setInterval(function(){
			el.eq(index).stop().fadeOut(1500);
			$('.bullets span').removeClass('slide-ativo');
			index++;

			if(index == maxSlide)
				index = 0;

			el.eq(index).stop().fadeIn(1500);
			$('.bullets span').eq(index).addClass('slide-ativo');
		},delay * 1000)
	}

	$('body').on('click','.bullets span',function(){
		$('.bullets span').removeClass('slide-ativo');
		$(this).addClass('slide-ativo');
		let spanIndex = $(this).index();
		index = spanIndex;
		el.stop().fadeOut(1500);
		el.eq(spanIndex).stop().fadeIn(1500);
	})

	initSlide();
	changeSlide();
})