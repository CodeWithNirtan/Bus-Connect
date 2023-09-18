<!DOCTYPE html>
<html lang="zxx" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/LOGO-01.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>SBMS - School Bus Management System</title>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
      rel="stylesheet"
    />

    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="https://unpkg.com/linearicons@1.0.2/dist/web-font/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    @include('sweetalert::alert')
    <header id="header">
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <a href="index.html">
            <h4><span><img               width="30px"
              height="auto" src="img/LOGO-01.png" alt="logo" style="margin-right:10px;"></span><span class="text-warning">BUS </span><span class="text-white">CONNECT </span></h4>
            <!-- <img src="img/logo.png" alt="" title="" /> -->
          </a>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="/">Home</a></li>
              <li><a href="#About">About</a></li>
              <li><a href="#whychoose">Why Choose Us</a></li>
              <li><a href="#gallery">Gallery</a></li>


              <li><a href="#contact">Contact</a></li>
              @if(auth()->user() != null)
                @if(auth()->user()->type == 0)
              <li><a href="/dashboard">Dashboard</a></li>
                @elseif(auth()->user()->type == 1)
              <li><a href="/schooldashboard">Dashboard</a></li>
                @else
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                @endif
              @else
              <li><a href="/login">Login</a></li>
              @endif
            </ul>
          </nav>
          <!-- #nav-menu-container -->
        </div>
      </div>
    </header>
    <!-- #header -->

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div
          class="row fullscreen d-flex align-items-center justify-content-between"
        >
          <div class="banner-content col-lg-6 col-md-6">
            <h1 class="bold">BUS CONNECT</h1>
            <h2 class="text-uppercase text-white">Book Van For School</h2>
            <p class="pt-10 pb-10 text-white">
              Your child's safety matters most to us. With our experienced
              drivers and well-maintained vans, we offer a secure and dependable
              school transportation solution. Join us now for a worry-free ride!
            </p>
            <a href="#" class="primary-btn text-uppercase">Explore More</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!-- Start home-about Area -->
    <section id="About" class="home-about-area section-gap">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 about-left">
            <img
              class="img-fluid"
              src="img/about_img.jpg"
              width="500px"
              height="400px"
              alt=""
            />
          </div>
          <div class="col-lg-6 about-right">
            <h1>Largest Network Of VANS</h1>
            <h4>We are here to listen from you deliver exellence</h4>
            <p>
              Join the safest and most extensive school van network in town!
              With our modern fleet and dedicated drivers, we guarantee a secure
              and convenient ride for your child. Experience unmatched
              reliability - choose our School Van Services today!
            </p>
            <!-- <a class="text-uppercase primary-btn" href="#">Get Details</a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start services Area -->
    <section id="whychoose" class="services-area pb-120">
      <div class="container">
        <div class="row section-title">
          <h1>Why Choose US</h1>
          <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 single-service">
            <span class="lnr lnr-bus"></span>
            <a href="#"><h4>Modern Vans</h4></a>
            <p>
              We Have The Most Modern And Adavanced Vans In the Towns.
            </p>
          </div>
          <div class="col-lg-4 single-service">
            <span class="lnr lnr-briefcase"></span>
            <a href="#"><h4>On Time Pick-up/Drop</h4></a>
            <p>
              We Are Time Punctual We Do Pick/Drop On Time.
            </p>
          </div>
          <div class="col-lg-4 single-service">
            <span class="lnr lnr-bus"></span>
            <a href="#"><h4>Trained Drivers</h4></a>
            <p>
              We Have The Most Trained And Well Manared Drivers.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End services Area -->

    <!-- Start image-gallery Area -->
    <section id="gallery" class="image-gallery-area section-gap">
      <div class="container">
        <div class="row section-title">
          <h1>Image Gallery that we like to share</h1>
          <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 single-gallery">
            <a href="img/g1.avif" class="img-gal"
              ><img class="img-fluid" src="img/g1.jpg" alt=""
            /></a>
            <a href="img/g4.jpg" class="img-gal"
              ><img class="img-fluid" src="img/g4.jpg" alt=""
            /></a>
          </div>
          <div class="col-lg-4 single-gallery">
            <a href="img/g2.jpg" class="img-gal"
              ><img class="img-fluid" src="img/g2.jpg" alt=""
            /></a>
            <a href="img/g5.jpg" class="img-gal"
              ><img class="img-fluid" src="img/g5.jpg" alt=""
            /></a>
          </div>
          <div class="col-lg-4 single-gallery">
            <a href="img/g3.jpg" class="img-gal"
              ><img class="img-fluid" src="img/g3.webp" alt=""
            /></a>
            <a href="img/g6.jpg" class="img-gal"
              ><img class="img-fluid" src="img/g6.jpg" alt=""
            /></a>
            <a href="img/g6.jpg" class="img-gal"
              ><img class="img-fluid" src="img/g7.jpg" alt=""
            /></a>
          </div>
        </div>
      </div>
    </section>
    <!-- End image-gallery Area -->


    <!-- Start contact-page Area -->
			<section id="contact" class="contact-page-area section-gap">
				<div class="container">
					<div class="row">

            {{-- <div class="map-wrap" style="width: 100%"><iframe width="100%" height="445px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=APtecg%20garden+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/population/">Population Estimator map</a></iframe></div> --}}
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Garden , Karachi.</h5>
									<p>
										Aptech Garden
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>12345678910</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>busconnect@gmail.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right"  action="/sendmessage" method="post">
								@csrf
                                <div class="row">
									<div class="col-lg-6 form-group">
										<input name="ContactName" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

										<input name="ContactEmail" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

										<input name="ContactSubject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="ContactMessage" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
									</div>
									<div class="col-lg-12">
										 <div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary" style="float: right;">Send Message</button>

									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- End contact-page Area -->


    <!-- start footer Area -->
    <footer class="footer-area section-gap">
      <div class="container">
        <div class="row">
          <p class="mt-80 mx-auto footer-text col-lg-12">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>


            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
      <img class="footer-bottom" src="img/footer-bottom.png" alt="" />
    </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
