$(function(){

	//Menu Lateral
	var windowSize = $(window)[0].innerWidth;

	//Menu Abertp ou Fechado
	if ($('.menu').is(':hidden')) {
		var open = false;
	}else{
		var open = true;
	}

	//Animação Menu
	$('header .container > i').click(function(){
		if (open == true) {
			//Fechar Menu
			$('.wraper-menu').css('opacity','0');
			$('.menu').css('width','0');
			$('.menu').css('padding','0');

			$('header').css('left','0');
			$('.content').css('left','0');
			$('header').css('width','100%');
			$('.content').css('width','100%');

			open = false;
		}else{
			//Abrir Menu
			$('.menu').css('width','300px');
			$('header').css('left','300px');
			$('.content').css('left','300px');
			$('header').css('width','calc(100% - 300px)');
			$('.content').css('width','calc(100% - 300px)');

			setTimeout(function(){
				$('.wraper-menu').css('opacity','1');
			},700)

			open = true;
		}
	});

	$(window).resize(function(){
		windowSize = $(window)[0].innerWidth;
		if(windowSize <= 768)
			open = false;
	});

})