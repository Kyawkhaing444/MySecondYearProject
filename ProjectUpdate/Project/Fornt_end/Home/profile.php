<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login();?>
<?php 
  if(isset($_POST["Submit"])){
    global $ConnectingDB;
    global $Connection;
    $name = mysqli_real_escape_string($Connection,$_POST["name"]);
    $_SESSION["Username"] = $name;
    $id = $_SESSION["User_Id"];
    $Phone = mysqli_real_escape_string($Connection,$_POST["phone"]);
    $Email = mysqli_real_escape_string($Connection,$_POST["email"]);
    $Gender=mysqli_real_escape_string($Connection,$_POST["Gender"]);
    $Trader = mysqli_real_escape_string($Connection,$_POST["Trader"]);
    $Address = mysqli_real_escape_string($Connection,$_POST["address"]);
      global $ConnectingDB;
      global $Connection;
      $Query = "UPDATE `User` SET `name`='$name', `Phone Number`='$Phone', `Email`='$Email', `Gender`='$Gender', `Trader`='$Trader', `Address`='$Address',`image`='$Image' WHERE id = '$id'";
      $Execute=mysqli_query($Connection,$Query);
      if($Execute){
      $_SESSION["SuccessMessage"]="အခ်က္အလက္မ်ားျပုျပင္လို့ ျပီးပါျပီ";
      Redirect_to("profile.php");
      }else{
      $_SESSION["ErrorMessage"]="တစ္ခုခုမွားေနပါသည္ ထပ္မံျကိုးစားျကည့္ပါ!";
      Redirect_to("profile.php");
      
    }	
  }elseif(isset($_POST["submit"])){
    global $ConnectingDB;
    global $Connection;
    $id = $_SESSION["User_Id"];
    $Image=$_FILES["Image"]["name"];
    if($Image == ""){
      $_SESSION["ErrorMessage"]="ပံုေရြးရန္ လုိအပ္ပါသည္ ။ ပံုကို နွိပ္ျပီး ေရြးနိုင္ပါသည္";
    }else{
    $Target="Upload/".basename($_FILES["Image"]["name"]);
    $_SESSION["image"] =$Image;
    $Query = "UPDATE `User` SET `image` ='$Image' WHERE `id` = '$id'";
    $Execute=mysqli_query($Connection,$Query);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
      if($Execute){
      $_SESSION["SuccessMessage"]="ပံုခ်ိန္းလို့ ျပီးပါျပီ";
      Redirect_to("profile.php");
      }else{
      $_SESSION["ErrorMessage"]="တစ္ခုခုမွားေနပါသည္ ထပ္မံျကိုးစားျကည့္ပါ!";
      Redirect_to("profile.php");
  }
}
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>profile</title>
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
                            <a class="page-scroll" href="#">မိမိ အေကာင့္ကို ျကည့္ရန္</a>
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
          <!-- profile-widget -->
          <div class="col-lg-12">
          <?php echo Message();
	            echo SuccessMessage();
	           ?>
            <div class="hprofile">
              <div class="panel-body">
                <div class="col-lg-3 col-sm-3">
                <form action="profile.php" method = "post" enctype="multipart/form-data">
                  <div class="profile-ava btn-file">
                    <img src="Upload/<?php echo $_SESSION["image"];?>" alt="" width="200px" height="200px"><input type="File" class="form-control" name="Image" id="imageselect">
                  </div><br><br>
                  <input type="Submit" name="submit" class="btn btn-primary btn-file pull-center" value="အေကာင့္မွ မိမိပံုကို ေျပာင္းရန္">
                  </form>
                </div>
                <div class="col-lg-9 col-sm-9 info">
                <?php 
                   global $ConnectingDB;
                   global $Connection;
                   $id = $_SESSION["User_Id"];
                   $Query = "SELECT * FROM User WHERE id='$id'";
                   $Execute = mysqli_query($Connection,$Query);
                   while($DataRows = mysqli_fetch_array($Execute)){
                       $Phone = $DataRows["Phone Number"];
                       $Email = $DataRows["Email"];
                       $Gender = $DataRows["Gender"];
                       $Trader = $DataRows["Trader"];
                       $Ability = $DataRows["Ability"];
                       $Address = $DataRows["Address"];
                ?>
                <div class="pull-center NewPost">
      <form action="profile.php" method="post" enctype="multipart/form-data">
	      <fieldset>
        <div class="form-group">
	         <span class="FieldInfo">အမည္</span><br><br>
	          <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['Username'];?>" placeholder="">
	       </div>
         <div class="form-group">
	         <span class="FieldInfo">ဖုန္းနံပါတ္</span><br><br>
	          <input type="text" class="form-control" name="phone" value ="<?php echo $Phone;?>" placeholder="">
         </div>
         <div class="form-group">
	          <span class="FieldInfo">အီးေမး</span><br><br>
	          <input class="form-control" type="text" name="email" value ="<?php echo $Email;?>" placeholder="">
	       </div>
           <div class="form-group">
	          <span class="FieldInfo">လိင္</span><br><br>
            <?php 
             if($Gender == "Male" || $Gender == "အမ်ုိးသား"){
            ?>
	          <input class="form-control" type="text" name="Gender" value ="အမ်ုိးသား" placeholder="">
             <?php }else{?>
              <input class="form-control" type="text" name="Gender" value ="အမ်ုိးသမီး" placeholder="">
             <?php } ?>
         </div>
	       <div class="form-group">
	         <span class="FieldInfo">ကုန္သည္အမ်ိုးအစား</span><br><br>
           <?php 
             if($Trader == "Gems" || $Trader == "ေက်ာက္"){
            ?>
	          <input class="form-control" type="text" name="Trader" value ="ေက်ာက္" placeholder="">
             <?php }else{?>
              <input class="form-control" type="text" name="Trader" value ="ကား" placeholder="">
             <?php } ?>
	       </div>
	       <div class="form-group">
	          <span class="FieldInfo">လိပ္စာ</span><br><br>
	          <input type="text" class="form-control" name="address" value ="<?php echo $Address;?>">
           </div>
	       <br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="မိမိအခ်က္အလက္ျပုျပင္မွု အတည္ျပုရန္">
	      </fieldset>
	   <br>
       </form>
      </div>
        </div>
                   <?php }?>
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