<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php 
if(isset($_POST["Submit"])){
  global $ConnectingDB;
  global $Connection;
  $Name=mysqli_real_escape_string($Connection,$_POST["name"]);
  $Phone=mysqli_real_escape_string($Connection,$_POST["phone"]);
  $Message=mysqli_real_escape_string($Connection,$_POST["message"]);
  date_default_timezone_set("Asia/Yangon");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  if(empty($Phone)){
    $_SESSION["ErrorMessage"]="အီးေမးလိပ္စာရိုက္ထည့္ရန္ လိုအပ္ပါသည္။";
    Redirect_to("Contact.php");
  }else{
      if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Phone)){
        $_SESSION["ErrorMessage"]="အီးေမးလိပ္စာမွားယြင္းေနပါသည္";
        Redirect_to("Contact.php");
      }
  }
  if(strlen($Message)>1000){
    $_SESSION["ErrorMessage"]="စာလံုး၅၀၀ ေအာက္သာရိုက္ပါ ။ ";
    Redirect_to("Contact.php");
  }else{
    global $ConnectingDB;
    global $Connection;
    $Read = "NO";
    $Query = "INSERT INTO `Message`(`id`, `name`, `Date`,`Email`, `message`, `read`) VALUES ('','$Name','$DateTime','$Phone','$Message','$Read')";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
    $_SESSION["SuccessMessage"]="ပို့ျပီးပါျပီး ။ မျကာမည္ အေျကာင္းျပန္ေပးပါမည္ ။";
    Redirect_to("Contact.php");
    }else{
    $_SESSION["ErrorMessage"]="တစ္ခုခု မွားယြင္းေနပါသည္။ ထပ္မံျကိုးစားျကည့္ပါ ။ ";
    Redirect_to("Contact.php");
      
    }
    
  }	
    
  }



?>
<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact us</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
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
    <div id="sticker" class="area">
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
                <a class="navbar-brand page-scroll sticky-logo" style="width:450px;" href="../../Back_end/Back-end(Admin Panel)/dashboard.php">
                  <h1><span>G&C</span>Trading</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-center">
                  <li>
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
                  <li  class="active">
                    <a class="page-scroll" href="Contact.php">ဆက္သြယ္ရန္</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
    </div>
    <!-- header-area end -->
  </header>
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>ဆက္သြယ္ရန္</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-offset-1 col-md-4 col-sm-6 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  ဖုန္းနံပါတ္ : ၀၉၉၆၅၇၀၉၃၆၀
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  အီးေမး : G&Ctrading@gmail.com<br>
                  <span>ဝက္ဆိုက္ဒ္ : www.G&Ctrading.com</span>
                </p>
              </div>
            </div>
          </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-offset-2 col-md-4 col-sm-6 col-xs-12">
            <!-- Start Map -->
              <div><br><br><img src="img/logo.png" width="50%" style=" text-align: center;";></div>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
          <?php echo Message();
	            echo SuccessMessage();
	           ?>
             <div class="pull-center NewPost">
          <form action="Contact.php" method="post" enctype="multipart/form-data">
	      <fieldset>
          <div class="form-group">
	          <input class="form-control" type="text" name="name" id="name" placeholder="နာမည္">
	       </div>
	       <div class="form-group">
	          <input class="form-control" type="text" name="phone" id="phone" placeholder="အီးေမး">
	       </div>
           <div class="form-group">
	          <textarea class="form-control" type="text" name="message" id="message" placeholder="အေျကာင္းအရာ(စာလံုး၅၀၀ေအာက္)"></textarea>
	       </div>
	       <br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="ပို့ရန္">
	      </fieldset>
	   <br>
       </form>
      </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
        </div>
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