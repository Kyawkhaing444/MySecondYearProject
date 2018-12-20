<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
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
                <a class="navbar-brand page-scroll sticky-logo" style="width:400px;" href="../../Back_end/Back-end(Admin Panel)/dashboard.php">
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
                  <li  class="active">
                    <a class="page-scroll" href="Blog.php">ေလ့လာ</a>
                  </li>
                  <li>
                  <form action="Blog.php" class="navbar-form navbar-right">
		            <div class="form-group">
		              <input type="text" class="form-control" placeholder="Search" name="Search" >
		            </div>
                    <button class="btn btn-default" name="SearchButton">ရွာရန္</button>
                   </form>
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
        <div class="col-sm-8">
            <?php
                global $ConnectingDB;
                global $Connection;
                if(isset($_GET['SearchButton'])){
                     $Search = $_GET['Search'];
                     $ViewQuery="SELECT * FROM AdminBlog
		             WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
		             OR category LIKE '%$Search%' OR post LIKE '%$Search%' ORDER BY id desc";
                }elseif(isset($_GET["Category"])){
                  $Category = $_GET["Category"];
                  $ViewQuery="SELECT * FROM AdminBlog WHERE category='$Category'";
                }else{
                    $ViewQuery="SELECT * FROM AdminBlog ORDER BY datetime desc";
                }
                $Execute = mysqli_query($Connection,$ViewQuery);
                while($DataRows = mysqli_fetch_array($Execute)){
                    $PostId=$DataRows["id"];
			        $DateTime=$DataRows["datetime"];
			        $Title=$DataRows["title"];
			        $Category=$DataRows["category"];
			        $Admin=$DataRows["author"];
			        $Image=$DataRows["image"];
                    $Post=$DataRows["post"];
            ?>   
            <div class="blogpost thumbnail">
			   <img class="img-responsive img-rounded"src="../../Back_end/Back-end(Admin Panel)/Upload/<?php echo $Image;  ?>" style=" width:800px; height: 500px;">
		         <div class="caption">
			        <h1 id="heading"> <?php echo $Title; ?></h1>
		            <p class="description">Category:<?php echo htmlentities($Category); ?> Published on
                    <?php echo htmlentities($DateTime);?>
                    </p>
		              <p class="post"><?php
		                 if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                          echo $Post; ?>
                      </p>
                 </div>
		          <a href="FullBlog.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">
			            Read More &rsaquo;&rsaquo;
                    </span>
                  </a>
		    </div>
		   <?php } ?>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h2 class="panel-title">ေရြးခ်ယ္ျကည့္ရွုရန္</h2>
	           </div>
             <div class="panel-body">
                <?php
                   global $ConnectingDB;
                   global $Connection;
                   $ViewQuery="SELECT * FROM category ORDER BY Cat_id desc";
                   $Execute=mysqli_query($Connection,$ViewQuery);
                   while($DataRows=mysqli_fetch_array($Execute)){
	                 $Id=$DataRows['Cat_id'];
	                 $Category=$DataRows['name'];
                ?>
               <a href="Blog.php?Category=<?php echo $Category; ?>">
                  <span id="heading"><?php echo $Category."<br>"."<hr>"; ?></span>
               </a>
              <?php } ?>
		        </div>
            <div class="panel-footer">
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