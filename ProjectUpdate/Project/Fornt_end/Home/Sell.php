<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login();?>
<?php 
if(isset($_POST["Submit"])){
  global $ConnectingDB;
  global $Connection;
  $IdFromURL=$_GET["id"];
  $Phone=mysqli_real_escape_string($Connection,$_POST["Phone"]);
  $NRC=mysqli_real_escape_string($Connection,$_POST["NRC"]);
  $Date=mysqli_real_escape_string($Connection,$_POST["date"]);
  $Place=mysqli_real_escape_string($Connection,$_POST["Place"]);
  if(empty($Phone)){
    $_SESSION["ErrorMessage"]="ဖုန္းနံပါတ္ရိုက္ထည့္ရန္ လိုအပ္ပါသည္။";
    Redirect_to("Sell.php");
  }else{
      if(!preg_match("/[0-9]{5,}/",$Phone)){
        $_SESSION["ErrorMessage"]="ဖုန္းနံပါတ္မွားယြင္းေနပါသည္";
        Redirect_to("Sell.php");
      }
  }    
  if(empty($NRC)){
  $_SESSION["ErrorMessage"]="မွတ္ပံုတင္နံပါတ္လိုအပ္ပါသည္";
  Redirect_to("Sell.php");
  }
  if(empty($Date)){
    $_SESSION["ErrorMessage"]="ေတြ့ဆံုလိုသည့္ အခ်ိန္လိုအပ္ပါသည္";
    Redirect_to("Sell.php");
  }
  if(empty($Place)){
    $_SESSION["ErrorMessage"]="ေတြ့ဆံုလိုသည့္ ေနရာလိုအပ္ပါသည္";
    Redirect_to("Sell.php");
  }else{
    global $ConnectingDB;
    global $Connection;
    $Query = "INSERT INTO `Confrimed_Auction`(`Phone Number`, `NRC`, `Date`,`Place`,`Post_id`) VALUES ('$Phone','$NRC','$Date','$Place','$IdFromURL')";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
    $_SESSION["SuccessMessage"]="အတည္ျပုျပီးပါျပီ";
    Redirect_to("Sell.php");
    }else{
    $_SESSION["ErrorMessage"]="လူျကီးမင္းသည္ ယခုေလွ်ာက္ထားေသာ ဖုန္းနံပါတ္ျဖင့္ အေကာင့္ေလွ်ာက္ထားျခင္းမရွိပါ။";
    Redirect_to("Sell.php");
      
    }
    
  }	
    
  }



?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Blog</title>
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
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                  <li  class="active">
                    <a class="page-scroll" href="Post.php"> ေဝမွ်ေရာင္းဝယ္</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="Auction.php">ပြဲခ်ိန္မ်ား</a>
                  </li>
                  <?php if($_SESSION["ability"] != ""){ ?>
                  <li>
                    <a class="page-scroll" href="Rating.php">အဆင့္</a>
                  </li>
                  <?php } ?>
                  <li>
                    <a class="page-scroll" style="width:200px;" href="Blog.php">ေလ့လာ</a>
                  </li>
                  <li class="dropdown">
                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" class = "ppimg" src="Upload/<?php echo $_SESSION["image"];?>s">
                            </span>
                            <span class="username"><?php echo $_SESSION["Username"];?></span>
                              <b class="caret"></b>
                      </a>
                     <ul class="dropdown-menu profile">
                          <div class=""></div>
                            <li>
                            <lebal class="btn btn-primary btn-block btn-lg" style="text-decoration:none;">
                            <a class="page-scroll" href="profile.php">မိမိ အေကာင့္ကို ျကည့္ရန္</a>
                            </lebal><br>
                            <?php if($_SESSION["ability"] !=  ""){ ?>
                            <lebal class="btn btn-primary btn-block btn-lg">
                            <a class="page-scroll" href="Confrimed_Auction.php">ေရာင္းဝယ္မွု ျပီးေျကာင္းအတည္ျပုရန္</a>
                            </lebal>
                           <?php }else{ ?>
                            <lebal class="btn btn-primary btn-block btn-lg">
                            <a class="page-scroll" href="Vote.php">ပြဲစားမ်ားအား မဲေပးရန္</a>
                            </lebal>
                           <?php } ?>
                            <br>
                            <lebal class="btn btn-primary btn-block btn-lg">
                            <a class="page-scroll" href="Logout.php">အေကာင့္မွ ထြက္ရန္</a>
                            </lebal>
                            </li>
                      </ul>
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

  <div class = "container">
      <div class="row">
        <div class="col-sm-12">
        <?php echo Message();
	            echo SuccessMessage();
	           ?>
        <div class="pull-center NewPost">
          <form action="Sell.php?id=<?php echo $_GET["id"];?>" method="post" enctype="multipart/form-data">
	      <fieldset>
	       <div class="form-group">
	          <span class="FieldInfo">ဖုန္းနံပါတ္:</span><br><br>
	          <input class="form-control" type="text" name="Phone" id="Phone" placeholder="ဖုန္းနံပါတ္">
	       </div>
           <div class="form-group">
	          <span class="FieldInfo">မွတ္ပံုတင္နံပါတ္:</span><br><br>
	          <input class="form-control" type="text" name="NRC" id="NRC" placeholder="မွတ္ပံုတင္နံပါတ္">
	       </div>
         <div class="form-group">
                           <span class="Fieldinfo">
                                               ေတြ့ဆံုနုိင္မည့္ အခ်ိန္(ညိွနွုိင္း) :<br><br>
                           </span>          
                           <input id="input" class="form-control" name="date" width="200" />
                           <script>
                               $('#input').datetimepicker({ footer: true, modal: true });
                           </script>
                          </div>
           <div class="form-group">
	          <span class="FieldInfo">ေတြ့ဆံုနုိင္မည့္ ေနရာ(ညိွနွုိင္း):</span><br><br>
	          <input class="form-control" type="text" name="Place" id="Place" placeholder="ေတြ့ဆံုနုိင္မည့္ ေနရာ">
	       </div>
	       <br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="အတည္ျပုရန္">
	      </fieldset>
	   <br>
       </form>
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