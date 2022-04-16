$(function(){

	//Menu Responsivo
	$('nav.mobile i').click(function(){
		if($('nav.mobile ul').is(':hidden') == true)
			$('nav.mobile ul').fadeIn();
		else
			$('nav.mobile ul').fadeOut();
	})

	//Scroll
	if($('target').length > 0){
		let el = '#'+$('target').attr('target');
		let scroll = $(el).offset().top;
		$('html,body').animate({scrollTop:scroll},1000);
	}


})