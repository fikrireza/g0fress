$(document).ready(function() {
 
  var win = $(window);
    // for dekstop
    if(win.width() > 960){
    var initNavbar = 100;
        win.scroll(function () {
            if (win.scrollTop() >= initNavbar) {
               $(".nav").css({
                    "background":"rgb(68,217,217)",
                    "box-shadow":"0px 6px 10px rgba(150,150,150,.6)",
                    "height":"45px"
                });
               $(".icon-nav, .icon-nav-wrapper, .nav-link-list, .nav-link-list-ul, .connect-social, .social-wrapper").css({
                    "height":"45px"
                });

            }
            else if (win.scrollTop() <= initNavbar) {
               $(".nav").css({
                    "background":"rgba(242,165,45,0)",
                    "box-shadow":"0px 6px 10px rgba(150,150,150,0)",
                    "height":"95px"
                });
               $(".icon-nav, .icon-nav-wrapper, .nav-link-list, .nav-link-list-ul, .connect-social, .social-wrapper").css({
                    "height":"95px"
                });

            }
        });
    }
    // end for dekstop
    
    // for mobile
    else if( win.width() < 720 ){
     
        $(".nav").on("click", ".slide-navbar-for-mobile", function (event) {
            if ( $( this ).hasClass( "open" ) ){
                $( ".nav" ).css({
                    "height":"100%"
                });
                $(".nav-link-list,.connect-social").css({
                    "display":"block"
                });
                $( this ).removeClass( "open" );
            }
            else{
                $( ".nav" ).css({
                    "height":"40px"
                });
                $(".nav-link-list,.connect-social").css({
                    "display":"none"
                });
                $( this ).addClass( "open" );   
            }

        });
            
    }
    // end for mobile

});