<!-- footer -->
<footer>
  <div class="container">

    <!-- footer second section -->

<hr>
    <!-- //footer second section -->
    <!-- footer third section -->
    <div class="footer-info w3-agileits-info">
      <!-- footer categories -->
      <div class="col-sm-5 address-right">
        <div class="col-xs-6 footer-grids">
          <h3>Categories</h3>
          <ul>
            <li>
              <a href="/electronics-home-appliances">Electronics and Home Appliances</a>
            </li>
            <li>
              <a href="/food-items-provisions">Food items and Provisions</a>
            </li>
          </ul>
        </div>
  <div class="col-xs-6 footer-grids">
  <h3>Payment Methods</h3>
              <img src="/images/images.png" alt="" width="100%">

        </div>
        <div class="clearfix"></div>
      </div>
      <!-- //footer categories -->
      <!-- quick links -->
      <div class="col-sm-5 address-right">
        <div class="col-xs-6 footer-grids">
          <h3>Quick Links</h3>
          <ul>
            <li>
              <a href="/about">About Us</a>
            </li>
            <li>
              <a href="/contact">Contact Us</a>
            </li>
            <li>
              <a href="/faq">Help and Faqs</a>
            </li>
            <li>
              <a href="/terms">Terms of use</a>
            </li>
            <li>
              <a href="/privacy">Privacy Policy</a>
            </li>
          </ul>
        </div>
        <div class="col-xs-6 footer-grids">
          <h3>Contact Us:</h3>
          <ul>
            <li>
              <i class="fa fa-map-marker"></i> 34 AKA Road, Off Okokomaiko Bustop, Ojo, Lagos State.</li>
            <li>
              <i class="fa fa-phone"></i> 080 6400 0024, 080 6411 4612 </li>
            <li>
              <i class="fa fa-envelope-o"></i>
              <a href="mailto:support@smithronics.com"> support@smithronics.com</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- //quick links -->
      <!-- social icons -->
      <div class="col-sm-2 footer-grids  w3l-socialmk">
        <h3>Follow Us on</h3>
        <div class="social">
          <ul>
            <li>
              <a class="icon fb" href="https://m.facebook.com/Smithronics/">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a class="icon lin" href="https://www.instagram.com/smithronics/">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li>
              <a class="social db" href="https://chat.whatsapp.com/FkgjGzUj81x5fYBb5qXlNH">
                <i class="fa fa-whatsapp"></i>
              </a>
            </li>
          </ul><br>
          <ul>
            <li>
              <a class="icon gp" href="#">
                <i class="fa fa-youtube"></i>
              </a>
            </li>
            <li>
              <a class="icon tw" href="https://mobile.twitter.com/ChineduOruche">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a class="icon lin" href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="agileits_app-devices">
          <h5></h5>
          <a href="#">

          </a>
          <a href="#">

          </a>

        </div>
      </div>
      <!-- //social icons -->
    </div>
    <!-- //footer third section -->
  </div>
</footer>
<!-- //footer -->
<!-- copyright -->
<div class="copy-right">
  <div class="container">
    <p>© 2019 Smithronics Integrated Enterprises,  All rights reserved.
    </p>
  </div>
</div>
<!-- //copyright -->
<!-- js-files -->
<!-- jquery -->
<script src="/js/jquery-2.1.4.min.js"></script>
<!-- //jquery -->

<!-- popup modal (for signin & signup)-->
<script src="/js/jquery.magnific-popup.js"></script>
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

  });
</script>
<!-- Large modal -->
<!-- <script>
  $('#').modal('show');
</script> -->
<!-- //popup modal (for signin & signup)-->

<!-- cart-js -->
<script src="/js/minicart.js"></script>
<script>
  paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

  paypalm.minicartk.cart.on('checkout', function (evt) {
    var items = this.items(),
      len = items.length,
      total = 0,
      i;

    // Count the number of each item in the cart
    for (i = 0; i < len; i++) {
      total += items[i].get('quantity');
    }

    if (total < 3) {
      alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
      evt.preventDefault();
    }
  });
</script>
<!-- //cart-js -->

<!-- price range (top products) -->
<script src="/js/jquery-ui.js"></script>
<script>
  //<![CDATA[
  $(window).load(function () {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 9000,
      values: [50, 6000],
      slide: function (event, ui) {
        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
      }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

  }); //]]>
</script>
<!-- //price range (top products) -->

<!-- flexisel (for special offers) -->
<script src="/js/jquery.flexisel.js"></script>
<script>
  $(window).load(function () {
    $("#flexiselDemo1").flexisel({
      visibleItems: 3,
      animationSpeed: 1000,
      autoPlay: true,
      autoPlaySpeed: 3000,
      pauseOnHover: true,
      enableResponsiveBreakpoints: true,
      responsiveBreakpoints: {
        portrait: {
          changePoint: 480,
          visibleItems: 1
        },
        landscape: {
          changePoint: 640,
          visibleItems: 2
        },
        tablet: {
          changePoint: 768,
          visibleItems: 2
        }
      }
    });

  });
</script>
<!-- //flexisel (for special offers) -->

<!-- password-script -->
<script>
  window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
  }

  function validatePassword() {
    var pass2 = document.getElementById("password2").value;
    var pass1 = document.getElementById("password1").value;
    if (pass1 != pass2)
      document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("password2").setCustomValidity('');
    //empty string means no validation error
  }
</script>
<!-- //password-script -->

<!-- smoothscroll -->
<script src="/js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="/js/move-top.js"></script>
<script src="/js/easing.js"></script>
<script>
  jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
      event.preventDefault();

      $('html,body').animate({
        scrollTop: $(this.hash).offset().top
      }, 1000);
    });
  });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
  $(document).ready(function () {
    /*
    var defaults = {
      containerID: 'toTop', // fading element id
      containerHoverID: 'toTopHover', // fading element hover id
      scrollSpeed: 1200,
      easingType: 'linear'
    };
    */
    $().UItoTop({
      easingType: 'easeOutQuart'
    });

  });
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->

<!-- imagezoom -->
	<script src="/js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
	<script src="/js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
  <script>
  function goBack() {
    window.history.back();
  }

  </script>


<script type="text/javascript" src="/js/sweetalert.min.js">
</script>
@include('sweet::alert')
