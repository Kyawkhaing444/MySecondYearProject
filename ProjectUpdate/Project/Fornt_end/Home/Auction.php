<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login();?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Auction</title>
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
                  <li   class="active">
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
                                <img alt="" class = "ppimg" src="Upload/<?php echo $_SESSION["image"];?>">
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
            <br><br><br>
            <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h1 class="panel-title">လာမည့္ ပြဲခ်ိန္မ်ား</h1>
             </div>
           </div>
        <div>
     <?php echo Message();
	         echo SuccessMessage();
     ?>
  </div><br>	
  <div class="table-responsive">
	   <table class="table table-striped table-hover">
		 <tr>
             <th style="font-size:15px;
             font-family:zawgyi-one;">စဥ္</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">ေရာင္းသူ</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">ျကီးျကပ္သူပြဲစား</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">အခ်ိန္</th>
		 	 <th style="font-size:15px;
             font-family:zawgyi-one;">ေနရာ</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">စာစု</th>
		 </tr>
  <?php
    global $ConnectingDB;
    global $Connection;
    $ViewQuery="SELECT * FROM Auction WHERE flag='YES' ORDER BY id desc;";
    $Execute=mysqli_query($Connection,$ViewQuery);
    $SrNo=0;
    while($DataRows=mysqli_fetch_array($Execute)){
	    $Id=$DataRows["id"];
	    $Post_id=$DataRows["Post_id"];
      $Name=$DataRows["writer"];
      $Sup_name = $DataRows["Supervisor"];
	    $date=$DataRows["date"];
      $place=$DataRows["place"];
	    $SrNo++;
	?>
	<tr>
		  <td><?php echo $SrNo; ?></td>
	    <td style="color: #5e5eff;">
        <?php
	        echo $Name;
	      ?></td>
      <td>
        <?php
	        echo $Sup_name;
	      ?></td>
	    <td>
        <?php
	        echo $date;
	      ?></td>
	    <td>
        <?php
          echo $place; 
        ?>
      </td>
	    <td>
	      <a href="FullPost.php?id=<?php echo $Post_id; ?>">
	      <span class="btn btn-primary">စာစုကို ျကည့္ရန္</span>
	      </a>
	    </td>
  </tr>
<?php } ?>
</table>
</div>
            <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h1 class="panel-title">ျပီးခဲ့ျပီးေသာ ပြဲမ်ား</h1>
             </div>
           </div>
        <div>
     <?php echo Message();
	         echo SuccessMessage();
     ?>
  </div><br>	
  <div class="table-responsive">
	   <table class="table table-striped table-hover">
		 <tr>
             <th style="font-size:15px;
             font-family:zawgyi-one;">စဥ္</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">ေရာင္းသူ</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">ဝယ္သူ</th>
		 	 <th style="font-size:15px;
             font-family:zawgyi-one;">ျကီးျကပ္သူပြဲစား</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">ေနရာ</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">အခ်ိန္</th>
             <th style="font-size:15px;
             font-family:zawgyi-one;">ေစ်း</th>
		 </tr>
  <?php
    global $ConnectingDB;
    global $Connection;
    $ViewQuery="SELECT * FROM Finished_Auction ORDER BY id desc;";
    $Execute=mysqli_query($Connection,$ViewQuery);
    $SrNo=0;
    while($DataRows=mysqli_fetch_array($Execute)){
	    $Id=$DataRows["id"];
	    $Seller=$DataRows["Seller"];
	    $Buyer=$DataRows["Buyer"];
	    $Supervisor=$DataRows["Supervisor"];
      $Final_place=$DataRows["Final_place"];
      $Final_Time=$DataRows["Final_Time"];
      $Final_price=$DataRows["Final_price"];
	    $SrNo++;
	?>
	<tr>
		  <td><?php echo $SrNo; ?></td>
	    <td style="color: #5e5eff;">
        <?php
	        echo $Seller;
	      ?></td>
	    <td>
        <?php
	        echo $Buyer;
	      ?></td>
	    <td>
        <?php
          echo $Supervisor; 
        ?>
      </td>
      <td>
        <?php
          echo $Final_place; 
        ?>
      </td>
      <td>
        <?php
          echo $Final_Time; 
        ?>
      </td>
      <td>
        <?php
          echo $Final_price; 
        ?>
      </td>
  </tr>
<?php } ?>
</table>
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