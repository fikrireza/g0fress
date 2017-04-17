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
    	singleItem:true,
      navigationText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i><i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i><i class='fa fa-chevron-right' aria-hidden='true'></i>"]
 
  	});

  $(".slider-product").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      items: 1,
      singleItem:true,
      pagination:true
 
    });

  $(".slider-second").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      items: 4,
      pagination:false,
      navigationText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i><i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i><i class='fa fa-chevron-right' aria-hidden='true'></i>"]
 
    });

  $(".slider-product").on("click", ".slider-product-front-animate", function (event) {
      $(this).fadeOut();
      $(this).next().fadeIn();
  });
  $(".slider-product").on("click", ".slider-product-back-animate", function (event) {
      $(this).fadeOut();
      $(this).prev().fadeIn();
  });

})