<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login();?>
<?php 
$Search="";
if(isset($_POST["SearchButton1"])){
  $Search=$_POST["Search"];
}
$Category=$_GET['Category'];
if(isset($_GET["Category"]) && !empty($Search)){
     Redirect_to("Post.php?Search=$Search&Category=$Category");
}
if(!isset($_GET["Category"])){
  Redirect_to("Post.php?Category=sell");
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>New Feed</title>
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
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">

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
       <div class="col-sm-12 col-lg-12 col-md-12">
       <form action="Post.php?Category=<?php echo $_GET['Category'];?>" class="navbar-form navbar-right" method="post">
		            <div class="form-group">
		              <input type="text" class="form-control" style="width:600px;" placeholder="ကား(သို့) ေက်ာက္ကို ေမာ္ဒယ္နာမည္(အမ်ိုးအစား)(သို့) ေစ်းအလိုက္ရွာရန္" name="Search" >
		            </div>
                    <button class="btn btn-default" name="SearchButton1">ရွာရန္</button>
                   </form>
          <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h2 class="panel-title">ေရြးခ်ယ္ျကည့္ရွုရန္</h2>
	           </div>
             <div class="panel-body">
          <ul>
      <?php 
       if(isset($_GET["Category"])){
          if($_GET["Category"]=="sell"){
      ?>
           <li>
             <div class="col-sm-2">
               <a href="Post.php?Category=sell" class=" btn btn-default">
                  <span id="heading">ေရာင္းဝယ္</span>
               </a>
             </div></li>
             <li>
             <div class="col-sm-offset-3 col-sm-1">
               <a href="Post.php?Category=share">
                  <span id="heading">ေဝမ်ွ</span>
               </a>
              </div>
              </li>
              <li>
              <div class="col-sm-offset-4 col-sm-1">
               <a href="Post.php?Category=ask">
                  <span id="heading">ေမးျမန္း</span>
               </a>
               </div>
               </li>
          <?php }elseif($_GET["Category"]=="share"){ ?>
            <li>
            <div class="col-sm-2">
               <a href="Post.php?Category=sell">
                  <span id="heading">ေရာင္းဝယ္</span>
               </a>
             </div></li>
             <li>
             <div class="col-sm-offset-3 col-sm-1">
               <a href="Post.php?Category=share" class=" btn btn-default">
                  <span id="heading">ေဝမ်ွ</span>
               </a>
              </div>
              </li>
              <li>
              <div class="col-sm-offset-4 col-sm-1">
               <a href="Post.php?Category=ask">
                  <span id="heading">ေမးျမန္း</span>
               </a>
               </div>
               </li>
          <?php }elseif($_GET["Category"]=="ask"){ ?>
            <li>
            <div class="col-sm-2">
               <a href="Post.php?Category=sell">
                  <span id="heading">ေရာင္းဝယ္</span>
               </a>
             </div></li>
             <li>
             <div class="col-sm-offset-3 col-sm-1">
               <a href="Post.php?Category=share">
                  <span id="heading">ေဝမ်ွ</span>
               </a>
              </div>
              </li>
              <li>
              <div class="col-sm-offset-4 col-sm-1">
               <a href="Post.php?Category=ask" class=" btn btn-default">
                  <span id="heading">ေမးျမန္း</span>
               </a>
               </div>
               </li>
               <?php }else{ ?>
                <li>
                <div class="col-sm-2">
               <a href="Post.php?Category=sell">
                  <span id="heading">ေရာင္းဝယ္</span>
               </a>
             </div></li>
             <li>
             <div class="col-sm-offset-3 col-sm-1">
               <a href="Post.php?Category=share">
                  <span id="heading">ေဝမ်ွ</span>
               </a>
              </div>
              </li>
              <li>
              <div class="col-sm-offset-4 col-sm-1">
               <a href="Post.php?Category=ask">
                  <span id="heading">ေမးျမန္း</span>
               </a>
               </div>
               </li>
               <?php } ?>
          <?php }else{ ?>
            <li>
             <div class="col-sm-2">
               <a href="Post.php?Category=sell" class="spanel btn btn-default">
                  <span id="heading">ေရာင္းဝယ္</span>
               </a>
             </div></li>
             <li>
             <div class="col-sm-offset-3 col-sm-1" >
               <a href="Post.php?Category=share">
                  <span id="heading">ေဝမ်ွ</span>
               </a>
              </div>
              </li>
              <li>
              <div class="col-sm-offset-4 col-sm-1">
               <a href="Post.php?Category=ask">
                  <span id="heading">ေမးျမန္း</span>
               </a>
               </div>
               </li>
          <?php }?>
             </ul>
		        </div>
          </div>
        <div>
</div>
   <div class="row">
        <div class="col-sm-8">
        <?php echo Message();
	            echo SuccessMessage();
	           ?>
            <div class = "new"> <a href="AddPost.php" class="btn btn-block btn-success"> ေဝမွ်ေရာင္းဝယ္လိုပါသလား </a></div>
            <?php
                global $ConnectingDB;
                global $Connection;
                if(isset($_GET['Search'])){
                  if(is_numeric($_GET['Search'])){
                     $Search = $_GET['Search'];
                     if(strlen($Search) == 1){
                       $SearchMax = $Search+5;
                       $SearchMin = $Search-5;
                     }else{
                      $SearchMax = $Search+50;
                      $SearchMin = $Search-50;
                     }
                     $Category=$_GET["Category"];
                     if($Category == "sell" || $Category == "share" || $Category == "ask"){
                      $ViewQuery="SELECT * FROM Post
                      WHERE (datetime LIKE '%$Search%' OR writer LIKE '%$Search%'
                      OR category LIKE '%$Search%' OR
                      time LIKE '%$Search%' OR place LIKE '%$Search%'
                      OR model LIKE '%$Search%' OR (`price` BETWEEN $SearchMin AND $SearchMax)
                      OR post LIKE '%$Search%') AND (`category` = '$Category') ORDER BY id desc";
                     }else{
                      $ViewQuery="SELECT * FROM Post
                      WHERE (datetime LIKE '%$Search%' OR writer LIKE '%$Search%'
                      OR category LIKE '%$Search%' OR
                      time LIKE '%$Search%' OR place LIKE '%$Search%'
                      OR model LIKE '%$Search%' OR (`price` BETWEEN $SearchMin AND $SearchMax)
                      OR post LIKE '%$Search%') AND (`kind` = '$Category' AND flag='YES') ORDER BY id desc";
                     }
                  $SearchMax = 0;
                  $SearchMin = 0;
                    }else{
                      $Category=$_GET["Category"];
                      $Search = $_GET['Search'];
                      $ViewQuery="SELECT * FROM Post
		             WHERE datetime LIKE '%$Search%' OR writer LIKE '%$Search%' OR
                 time LIKE '%$Search%' OR place LIKE '%$Search%'
                 OR category LIKE '%$Search%'
                 OR model LIKE '%$Search%' OR post LIKE '%$Search%' AND (category='$Category' AND flag='YES') ORDER BY id desc";
                    }
                }elseif(isset($_GET["Category"])){
                  $Category = $_GET["Category"];
                  if($Category=="ေက်ာက္"){
                     $ViewQuery="SELECT * FROM Post WHERE kind='$Category' AND flag='YES'";
                  }elseif($Category == "ကား"){
                    $ViewQuery="SELECT * FROM Post WHERE kind='$Category'  AND flag='YES'";
                   }else{
                    $ViewQuery="SELECT * FROM Post WHERE category='$Category'  AND flag='YES'";
                   }
                }else{
                    $ViewQuery="SELECT * FROM Post  WHERE flag='YES'";
                }
                $Execute = mysqli_query($Connection,$ViewQuery);
                while($DataRows = mysqli_fetch_array($Execute)){
                  $PostId=$DataRows["id"];
			            $DateTime=$DataRows["datetime"];
                  $Name=$DataRows["writer"];
                  $Category = $DataRows["category"];
                  $model = $DataRows["model"];
                  $price = $DataRows["price"];
                  $date = $DataRows["time"];
                  $place = $DataRows["place"];
			            $Image=$DataRows["image"];
                  $Post=$DataRows["post"];
                  $kind = $DataRows["kind"];
            ?>   
            <div class="blogpost thumbnail">
			   <img class="img-responsive img-rounded"src="Upload/<?php echo $Image;  ?>" style=" width:100%; height: 500px;" >
		         <div class="caption">
             <?php 
                 if($Category == "sell" || $kind =="ေက်ာက္" || $kind == "ကား"){
              ?>
              <a href="Sell.php?id=<?php echo $PostId;?>" class="pull-right btn btn-success" style="font-size:15px;margin-top:25px;">ေရာင္းဝယ္မွု အတည္ျပုလိုပါသလား</a>
                 <?php }?>  
			        <h1 id="heading"> <?php echo $Name; ?></h1>
                 <p class="description">စာစုအမ်ုိးအစား:<?php echo htmlentities($Category); ?> Published on
                    <?php echo htmlentities($DateTime);?>
                    </p>
                    <hr>
                    <?php 
                     if(isset($_GET["Category"])){
                       if($Category == "sell"){
                         if( $kind == "ကား"){
                          $ViewQuery1 = "SELECT * FROM Car WHERE Car_NUM = '$PostId'";
                  $Execute1 = mysqli_query($Connection,$ViewQuery1);
                  while($DataRows1 = mysqli_fetch_array($Execute1)){
                    $id = $DataRows1["id"];
                    $Car_NUM = $DataRows1["Car_NUM"];
                    $engine_power = $DataRows1["engine_power"];
                    $fuel = $DataRows1["fuel"];
                    $mileage = $DataRows1["mileage"];
                    $steering = $DataRows1["sterring"];
                    $transmission = $DataRows1["transmission"];      
                    $color = $DataRows1["color"]; 
                    $plate = $DataRows1["plate_number"]; 
                    $owner = $DataRows1["owner"];
                    ?>
                  <div class="col-sm-8">
                    <h5 class="description">ေမာ္ဒယ္:<?php echo htmlentities($model); ?>
                    </h5>
                    <h5 class="description">ေစ်း:<?php echo htmlentities($price."သိန္း"); ?>
                    </h5>
                    <p class="description"><img src="img/icon/engine_power.svg"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($engine_power); ?></p>
                  <p class="description"><img src="img/icon/fuel-facc.svg"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($fuel); ?></p>
                  <p class="description"><img src="img/icon/mileage.svg"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($mileage); ?></p>
                  <p class="description"><img src="img/icon/steering.svg"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($steering); ?></p>
                  </div>
                  <div class="col-sm-3">
                  <br><br><br><br>
                  <p class="description"><img src="img/icon/transmission.svg"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($transmission); ?></p>
                  <p class="description"><img src="img/icon/color.svg"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($color); ?></p>
                  <p class="description"><img src="img/icon/plate_number.svg"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($plate); ?></p>
                  <p class="description"><img src="img/icon/owners.svg"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($owner); ?></p>
                  </div>
                  <?php } ?>
                  <div class="col-sm-12">
                  <p class="description">ေတြ့ဆံုနိုင္သည္ အခ်ိန္(ညိွနွုိင္း): <?php echo $date; ?>
                    </p>
                    <p class="description">ေတြ့ဆံုနိုင္သည္ ေနရာ(ညိွနွုိင္း): <?php echo htmlentities($place); ?>
                    </p>
                    <p class="post"><?php
		                 if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                          echo $Post; ?>
                      </p>
                      <a href="FullPost.php?id=<?php echo $PostId; ?>&Category=<?php echo $Category;?>" class="pull-right"><span class="btn btn-info">
			            Read More &rsaquo;&rsaquo;
                    </span>
                  </a>
              </div>
              </div>
                     <?php }elseif( $kind =="ေက်ာက္" ){?>
                      <p class="description">အရြယ္အစား:<?php echo htmlentities($model); ?>
                    </p>
                    <p class="description">ေစ်း:<?php echo htmlentities($price."သိန္း"); ?>
                    </p>
                    <p class="description">ေတြ့ဆံုနိုင္သည္ အခ်ိန္(ညိွနွုိင္း): <?php echo $date; ?>
                    </p>
                    <p class="description">ေတြ့ဆံုနိုင္သည္ ေနရာ(ညိွနွုိင္း): <?php echo htmlentities($place); ?>
                    </p>
                    <p class="post"><?php
		                 if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                          echo $Post; ?>
                      </p>
              </div>
		          <a href="FullPost.php?id=<?php echo $PostId; ?>&Category=<?php echo $Category;?>"><span class="btn btn-info">
			            Read More &rsaquo;&rsaquo;
                    </span>
                  </a>
                     <?php } ?>
                       <?php }else{?>
                        <p class="post"><?php
		                 if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                          echo $Post; ?>
                      </p>
              </div>
		          <a href="FullPost.php?id=<?php echo $PostId; ?>&Category=<?php echo $Category;?>"><span class="btn btn-info">
			            Read More &rsaquo;&rsaquo;
                    </span>
                  </a>
                       <?php } ?>
                     <?php } ?>
		             
		    </div>
       <?php } ?>
        </div>
        <br><br><br>
        <div class="col-sm-4">
          <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h2 class="panel-title">ေရြးခ်ယ္ျကည့္ရွုရန္</h2>
	           </div>
             <div class="panel-body" style="background-color: rgba(228, 228, 228, 0.89);">
             <?php 
             if($Category == "ေက်ာက္"){
             ?>
               <a href="Post.php?Category=ေက်ာက္">
                  <span id="heading">ေက်ာက္<br><hr></span>
               </a>
               <a href="Post.php?Category=ကား">
                  <span id="heading">ကား<br><hr></span>
               </a>
            <?php }elseif($Category == "ကား"){ ?>
               <a href="Post.php?Category=ေက်ာက္">
                  <span id="heading">ေက်ာက္<br><hr></span>
               </a>
               <a href="Post.php?Category=ကား">
                  <span id="heading">ကား<br><hr></span>
               </a>
            <?php }else{ ?> 
               <a href="Post.php?Category=ေက်ာက္">
                  <span id="heading">ေက်ာက္<br><hr></span>
               </a>
               <a href="Post.php?Category=ကား">
                  <span id="heading">ကား<br><hr></span>
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