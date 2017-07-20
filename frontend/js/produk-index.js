$(document).ready(function() {

	$(".slider-product").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      items: 3,
      singleItem:false,
      pagination:false,
      slideSpeed : 1200,
      navigationText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i><i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i><i class='fa fa-chevron-right' aria-hidden='true'></i>"],
      responsive:{
        540:{
            items:1,
            singleItem:true
        }
    }
 
    });
    
})