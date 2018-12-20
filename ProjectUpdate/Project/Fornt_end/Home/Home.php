<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">
</head>

<body>

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="../../Back_end/Back-end(Admin Panel)/dashboard.php">
                  <h1><span>G&C</span>Trading</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right tfont">
                  <li class="active">
                    <a class="page-scroll" href="Home.php">အဖြင့္စာမ်က္နွာ</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="Post.php"> ေဝမွ်ေရာင္းဝယ္</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="Auction.php">ပြဲခ်ိန္မ်ား</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="Rating.php">အဆင့္</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="Blog.php">ေလ့လာ</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">အေျကာင္း</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="Contact.php">ဆက္သြယ္ရန္</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="img/slider/slider1.jpg" alt="" title="#slider-direction-1" width="100%" height="100%" />
        <img src="img/slider/slider2.jpg" alt="" title="#slider-direction-2" width="100%" height="100%" />
        <img src="img/slider/slider3.jpg" alt="" title="#slider-direction-3" width="100%" height="100%" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 2 -->
                <div class="layer-1-3 wow slideInUp content tfont" data-wow-duration="2s" data-wow-delay=".1s">
                  အခ်ိန္တိုအတြင္း ကိုယ့္ေက်ာက္နဲ့ ကားကို ေစ်းနွုန္းမွန္ကန္စြာနဲ့ ေရာင္းနိုင္တဲ့ ေနရာ
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <div class="layer-1-3 wow slideInUp content tfont" data-wow-duration="2s" data-wow-delay=".1s">
                  ကားတစ္ပတ္ရစ္ေကာင္းေကာင္းေလး ဝယ္ဖို့စဥ္းစားေနပါသလား G&Ctradingနဲ့သာဆက္သြယ္လိုက္ပါ။
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <div class="layer-1-3 wow slideInUp content tfont" data-wow-duration="2s" data-wow-delay=".1s">
                         ေရာင္းဝယ္မွုလုပ္တဲ့အခါ ကြ်မ္းက်င္တဲ့ဝါရင့္ပြဲစားမ်ားက ညိွ့နွုိင္းေဆာင္ရြက္ေပးေသာေျကာင့္ ေစ်းနွုန္းမွန္ကန္စြာနဲ့ ယံုျကည္စိတ္ခ်စြာ ေရာင္းဝယ္နိုင္မွာ ျဖစ္ပါတယ္။
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>G&C Trading ဆိုတာဘာလဲ</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="img/logo.png" alt="" width="500px" height="350px">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <p>
              G&C Trading Company တြင္ အသံုးျပဳသူမ်ားအေနျဖင့္ ေရာင္းလိုေသာ ေက်ာက္( သို ့)ကားအေၾကာင္းကို     post တစ္ခုအျဖစ္တင္နိုင္ပါသည္။ ၀ယ္ယူလိုသူသည္ မိမိစိတ္၀င္စားေသာ post ေအာက္တြင္ comment မ်ားေပးျခင္းျဖင့္ ေရာင္းသူ၀ယ္သူအၾကားညိွနိုင္းမႈမ်ား ေဆာင္ရြက္နိုင္ပါသည္။ ညိွနိုင္းမႈအဆင္ေျပပါက ပို့စ္ေအာက္ရွိ္ confirm button ကိုနွိပ္၍ အေရာင္းပဲြတစ္ခု က်င္းပနိုင္ပါသည္။ ထိုအေရာင္းပဲြတြင္ admin သတ္မွတ္ေပးေသာ superviser နွင့္ ညွိနိုင္းတို္င္ပင္၍ တိက်မွန္ေသာေစ်းနႈန္း အေရာင္းအ၀ယ္ ျပဳလုပ္နိုင္ပါသည္။ အကယ္၍ လိမ္လယ္မႈမ်ာျဖစ္ပြားပါက ကၽြန္ေတာ္တုိ ့ G&C Trading Companyမွ တာ၀န္ယူမႈအျပည့္ျဖင့္ ေျဖရွင္းေပးသြားပါမည္။ ကၽြန္ေတာ္တုိ ့ G&C Trading Company ၏ဦးတည္ခ်က္မ်ားမွာ-
              </p>
              <ul>
                <li>
                  <i class="fa fa-check"></i> အခ်ိန္ကုန္သက္သာေစရန္
                </li>
                <li>
                  <i class="fa fa-check"></i>  ေက်ာက္နွင့္ကားအေျကာင္းပိုမိုသိရွိေစရန္
                </li>
                <li>
                  <i class="fa fa-check"></i>  ေက်ာက္( သို႔ )ကားကို တိက်ေသာေစ်းျဖင့္ ေရာင္း၀ယ္နိုင္ေစရန္နွင့္
                </li>
                <li>
                  <i class="fa fa-check"></i> ယံုၾကည္မႈအျပည့္ျဖင့္ေရာင္း၀ယ္မႈျဖစ္ေျမာက္ေစရန္တို႕ျဖစ္ပါသည္။
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
  <!--end contact area -->
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
