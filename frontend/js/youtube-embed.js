$(document).ready(function() {
	$(function(){
		$('.vidio-content').click(function() {
	    	if(!$( "#vidio-show.youtube-embed" ).hasClass( "active" )){
				$( "#vidio-show.youtube-embed" ).addClass( "active" );
				var vedioEmbed = $(this).data('url');
				var vedioTitle = $(this).data('title');
				var vedioDescription = $(this).data('description');

				$( "#youtube-embed" ).html("<iframe src='"+ vedioEmbed +"' frameborder='0' allowfullscreen></iframe>");
				$( "#youtube-embed-title" ).html(vedioTitle);
				$( "#youtube-embed-description" ).html(vedioDescription);
	    	}
	    });
	    $('#youtube-embed-close').click(function() {
	    	if($( "#vidio-show.youtube-embed" ).hasClass( "active" )){
				$( "#vidio-show.youtube-embed" ).removeClass( "active" );
	    	}
	    });
	});
})
