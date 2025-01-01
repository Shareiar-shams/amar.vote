(function ($) {
    "use strict";

    jQuery(document).ready(function () {


        /*  - Scroll-top 
      	---------------------------------------------*/
        jQuery(window).on('scroll', function () {
            var scrollTop = jQuery(this).scrollTop();
            if (scrollTop > 400) {
                jQuery('.top').fadeIn();
            } else {
                jQuery('.top').fadeOut();
            }
        });

        jQuery('.top').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 1000);

            return false;
        });






    });


    jQuery(window).on("load", function () {
        /*  - Pre Loader
        ---------------------------------------------*/
        $(".pre-loader-area").fadeOut();

    });


}(jQuery));
