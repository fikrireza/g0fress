var win = $(window);

function scrollWin() {
	
	if(win.width() > 960){
    	var y = 300;
	}

	$('html,body').stop().animate({
	    scrollTop: '+=' + y
	});

}

$(document).ready(function() {
 
  	$(".slider").owlCarousel({
 
    	navigation : true, // Show next and prev buttons
    	slideSpeed : 300,
    	paginationSpeed : 400,
    	singleItem:true
 
  	});

  $(".slider-second").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      items: 4,
      pagination:false
 
    });

})