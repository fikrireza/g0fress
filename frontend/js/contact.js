// disable scrolling on embed google maps
$('.wrapper-maps')
	.click(function(){
			$(this).find('iframe').addClass('clicked')
	})
	.mouseleave(function(){
			$(this).find('iframe').removeClass('clicked')
	});