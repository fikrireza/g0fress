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

               $(".social-wrapper-label").fadeOut();
            	
            	document.getElementById("nav-social-icon-facebook").setAttribute("src", "public/image/default/facebook-white.png");
            	document.getElementById("nav-social-icon-twitter").setAttribute("src", "public/image/default/twitter-white.png");
            	document.getElementById("nav-social-icon-instagram").setAttribute("src", "public/image/default/instagram-white.png");

               // $(".nav-bar").css({"margin-top":"70px"});
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

               $(".social-wrapper-label").fadeIn();
            	document.getElementById("nav-social-icon-facebook").setAttribute("src", "public/image/default/facebook-gray.png");
            	document.getElementById("nav-social-icon-twitter").setAttribute("src", "public/image/default/twitter-gray.png");
            	document.getElementById("nav-social-icon-instagram").setAttribute("src", "public/image/default/instagram-gray.png");
            }
        });
    }
    // end for dekstop
    
    // for mobile
    // else if( win.width() < 720 ){
    //     var initNavbar = 60;
    //     // alert("success");
    //     $(".hide-in-mobile").remove();
    //     $(".magestore-bannerslider").remove();
    //     $(".bar").css({"padding":"10px 0px"});

    //     win.scroll(function () {
    //         if (win.scrollTop() >= initNavbar) {
    //            $(".header-nav").css({"position":"fixed", "top":"0"});
    //            $(".nav-bar").css({"margin-top":"70px"});
    //         }
    //         else if (win.scrollTop() <= initNavbar) {
    //            $(".header-nav").css({"position":"relative"});
    //            $(".nav-bar").css({"margin-top":"0px"});
    //         }
    //     });
    // }
    // end for mobile

});