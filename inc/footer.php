<!--    [ Start Footer Area]-->
<footer>
    <div class="copy-right">
        <div class="col-md-12 text-center">
            <div class="footer-top">
                <!--<p>Copyright &copy; <a href="http://facebook.com/preneurlab">Preneur Lab </a>2018</p>-->
                <p>We reserve the right to change the terms and conditions at any time and the decision of The Torun Digital is considered as final.</p>
            </div>
            <div class="row">
    <div class="col-md-12 text-center">
        <div class="copy-context">
            <p>&copy; 2018. All Rights Reserved. Coded with ❤️ at <span><a href="http://preneurlab.com/"> <img width="100px" src="http://preneurlab.com/wp-content/uploads/2018/01/cropped-preneurlab.png"/></a></span></p>
        </div>
    </div>
</div>
        </div>
    </div>
</footer>
<!--    [Finish Footer Area]-->

<!--SCROLL TOP BUTTON-->
<a href="#" class="top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>






<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!--    [jQuery]        -->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<!--    [Popper Js]     -->
<script src="assets/js/popper-1.14.3.min.js"></script>

<!--    [Bootstrap Js]  -->
<script src="assets/js/bootstrap.min.js"></script>

<!--    [OwlCarousel Js]    -->
<script src="assets/js/owl.carousel.min.js"></script>

<!--    [Navbar Fixed Js]   -->
<script src="assets/js/jquery.sticky.js"></script>

<!--    [Main Custom Js]    -->
<script src="assets/js/main.js"></script>

<!--    [selecr 2 js]   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    /*$("#header").sticky();*/
    /*$("#campaign").sticky();*/

</script>
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll >= 1) {
            //clearHeader, not clearheader - caps H
            $(".submition").addClass("submition-top");
        }
    });
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll <= 100) {
            //clearHeader, not clearheader - caps H
            $(".submition").removeClass("submition-top");
        }
    });

</script>
<script>
    /*  HOME Carousel
                                ----------------------------------*/
    $(".partners-logo ").owlCarousel({
        items: 3,
        dots: true,
        autoplay: true,
        nav: false,
        loop: true,

    });

</script>
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll >= 70) {
            //clearHeader, not clearheader - caps H
            $("#submit-flow").addClass("submit-flow-2");
        }
    });
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll <= 70) {
            //clearHeader, not clearheader - caps H
            $("#submit-flow").removeClass("submit-flow-2");
        }
    });

</script>
</body>

</html>
