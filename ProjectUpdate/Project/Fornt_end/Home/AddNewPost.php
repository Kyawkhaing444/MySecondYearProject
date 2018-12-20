<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login();?>
<?php 
if(isset($_POST["Submit"])){
  global $ConnectingDB;
  global $Connection;
  $Category=$_GET["Category"];
  $model = mysqli_real_escape_string($Connection,$_POST["model"]);
  $engine = mysqli_real_escape_string($Connection,$_POST["engine"]);
  if(!empty($engine)){
    $kind = "ကား";
  }
  $fuel = mysqli_real_escape_string($Connection,$_POST["fuel"]);
  $mileage = mysqli_real_escape_string($Connection,$_POST["mileage"]);
  $transmission = mysqli_real_escape_string($Connection,$_POST["transmission"]);
  $color = mysqli_real_escape_string($Connection,$_POST["color"]);
  $plate_number = mysqli_real_escape_string($Connection,$_POST["plate_number"]);
  $owner = mysqli_real_escape_string($Connection,$_POST["owner"]);
  $steering= mysqli_real_escape_string($Connection,$_POST["steering"]);
  if($steering == "2"){
    $steering = "Right Hand Drive";
  }else{
    $steering="Left Hand Drive";
  }
  $price = mysqli_real_escape_string($Connection,$_POST["price"]);
  $Post=mysqli_real_escape_string($Connection,$_POST["Post"]);
  $Date = mysqli_real_escape_string($Connection,$_POST["date"]);
  $Place = mysqli_real_escape_string($Connection,$_POST["Place"]);
  date_default_timezone_set("Asia/Yangon");
  $CurrentTime=time();
  //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  $Image=$_FILES["Image"]["name"];
  $Target="Upload/".basename($_FILES["Image"]["name"]);
  if(empty($model)&&empty($price)&&empty($Post)&&empty($Date)&&empty($Place)&&empty($kind) && empty($engine)&&empty($transmission)&&empty($color)&&empty($plate_number)&&empty($fuel)&&empty($mileage)&&empty($owner)){
    $_SESSION["ErrorMessage"] = "အကုန္ျဖည့္ဖို့ လုိအပ္ပါသည္";
    Redirect_to("AddNewPost.php?Category=$Category");
  }
    global $ConnectingDB;
    global $Connection;
    $Name = $_SESSION["Username"];
    $Query = "INSERT INTO `Post`(`id`, `datetime`, `writer`,`category`,`model`,`price`,`time`,`place`,`image`,`post`,`kind`,`flag`) VALUES ('','$DateTime','$Name','$Category','$model','$price','$Date','$Place','$Image','$Post','$kind','YES')";
    $Execute=mysqli_query($Connection,$Query);
    $Query2 = "SELECT `id` FROM `Post` WHERE datetime='$DateTime'";
    $Execute2=mysqli_query($Connection,$Query2);
    $id = mysqli_fetch_assoc($Execute2);
    $Car_NUM = $id["id"];
    $Query1 = "INSERT INTO `Car`(`id`, `Car_NUM`, `engine_power`, `fuel`, `mileage`, `sterring`, `transmission`, `color`, `plate_number`, `owner`) VALUES ('','$Car_NUM','$engine','$fuel','$mileage','$steering','$transmission','$color','$plate_number','$owner')";
    $Execute1 = mysqli_query($Connection,$Query1);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if($Execute && $Execute1 && $Execute2){
    $_SESSION["SuccessMessage"]="ပို့တင္လို့ျပီး ပါျပီ";
    Redirect_to("Post.php");
    }else{
    $_SESSION["ErrorMessage"]="တစ္ခုခု မွားေနပါသည္ ။ ေက်းဇူးျပု၍ ထပ္မံျကိုးစားပါ ။";
    Redirect_to("AddNewPost.php");
    
  }	
    
  }elseif(isset($_POST["Submit1"])){
    global $ConnectingDB;
    global $Connection;
    $Category=$_GET["Category"];
  $model1 = mysqli_real_escape_string($Connection,$_POST["model1"]);
  $price1 = mysqli_real_escape_string($Connection,$_POST["price1"]);
  $Post1=mysqli_real_escape_string($Connection,$_POST["Post1"]);
  $Date1 = mysqli_real_escape_string($Connection,$_POST["date1"]);
  $Place1 = mysqli_real_escape_string($Connection,$_POST["Place1"]);
  if(empty($engine)){
    $kind1 = "ေက်ာက္";
  }
  date_default_timezone_set("Asia/Yangon");
  $CurrentTime=time();
  //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  $Image1=$_FILES["Image1"]["name"];
  $Target="Upload/".basename($_FILES["Image1"]["name"]);
  if(empty($model1)&&empty($price1)&&empty($Post1)&&empty($Date1)&&empty($Place1)){
    $_SESSION["ErrorMessage"] = "အကုန္ျဖည့္ဖို့ လုိအပ္ပါသည္";
    Redirect_to("AddNewPost.php?Category=$Category");
  }
    global $ConnectingDB;
    global $Connection;
    $Name = $_SESSION["Username"];
    $Query = "INSERT INTO `Post`(`id`, `datetime`, `writer`,`category`,`model`,`price`,`time`,`place`,`image`,`post`,`kind`,`flag`) VALUES ('','$DateTime','$Name','$Category','$model1','$price1','$Date1','$Place1','$Image1','$Post1','$kind1','YES')";
    $Execute=mysqli_query($Connection,$Query);
    move_uploaded_file($_FILES["Image1"]["tmp_name"],$Target);
    if($Execute){
      $_SESSION["SuccessMessage"]="ပို့တင္လို့ျပီး ပါျပီ";
      Redirect_to("Post.php");
      }else{
      $_SESSION["ErrorMessage"]="တစ္ခုခု မွားေနပါသည္ ။ ေက်းဇူးျပု၍ ထပ္မံျကိုးစားပါ ။";
      Redirect_to("AddNewPost.php");
      
    }	
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add new post</title>
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
                  <?php
                  if($_SESSION["ability"] != ""){
                    ?>
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
        <?php echo Message();
	            echo SuccessMessage();
	           ?>
        <div class="pull-center NewPost">
          <form action="AddNewPost.php?Category=<?php echo $_GET["Category"]?>" method="post" enctype="multipart/form-data">
	      <fieldset>
        <?php 
          $Category=$_GET["Category"];
          if($Category == "sell"){
        ?>
        <div class="col-sm-offset-5">
        <span class="FieldInfo">အမ်ိုးအစား:</span><br><br>
        <div class="btn-group">
            <a class="page-scroll btn btn-default btn-steering-position" href="#car">ကား</a>
            <a class="page-scroll btn btn-default btn-steering-position" href="#gem">ေက်ာက္</a>
            </div>
            </div>
        <br>
        <div id="car">
        <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h1 class="panel-title">ကား</h1>
             </div>
       <div class="panel-body">
       <div class="col-sm-6">
        <div class="form-group">
        <input type="text" class="form-control" name="model" placeholder=" ကား(ေမာ္ဒယ္)">
         </div><div class="form-group">
         <input type="text" class="form-control" name="engine" placeholder="အင္ဂ်င္ပါဝါ">
         </div><div class="form-group">
         <input type="text" class="form-control" name="fuel" placeholder="ဆီအမ်ိုးအစား">
         </div><div class="form-group">
            <input type="text" class="form-control" name="mileage" placeholder="ေမာင္းနွင္ျပီး ကီလိုမီတာ">
         </div>
         </div>
         <div class="col-sm-6">
            <div class="form-group">
            <input type="text" class="form-control" name="transmission" placeholder="ဂီယာ">
         </div><div class="form-group">
         <input type="text" class="form-control" name="color" placeholder="အေရာင္">
         </div><div class="form-group">
         <input type="text" class="form-control" name="plate_number" placeholder="ကားလိုင္စင္နံပါတ္">
         </div><div class="form-group">
         <input type="text" class="form-control" name="owner" placeholder="ပိုင္ဆိုင္ျပီးသူ အေရအတြက္">
         </div>
         </div><br><br>
         &nbsp;&nbsp;&nbsp;&nbsp;<div class="btn-group">
            <button class="btn btn-default btn-steering-position" type="button" name="steering" value="1">ဘယ္ေမာင္း</button>
            <button class="btn btn-default btn-steering-position" type="button" name="steering" value="2">ညာေမာင္း</button>
            </div><br><br>
         <div class="form-group">
	         <span class="FieldInfo"> ေစ်း: ေရာင္းလိုသည့္ ေစ်းနွုန္း(၅သိန္းေအာက္)</span><br><br>
           <input type="text" class="form-control" name="price" placeholder="ဥပမာ- ၁၀သိန္း ဆို-->10 ရိုက္ပါ,၁၀၀သိန္း ဆို-->100 ရိုက္ပါ">
         </div><br>
         <div class="form-group">
                           <span class="FieldInfo">
                                               ေတြ့ဆံုနိုင္မည့္ အခ်ိန္ :<br><br>
                           </span>          
                           <input id="input" class="form-control" name="date" width="200" />
                           <script>
                               $('#input').datetimepicker({ footer: true, modal: true });
                           </script>
                          </div><br>
           <div class="form-group">
	          <span class="FieldInfo">ေတြ့ဆံုနုိင္မည့္ ေနရာ:</span><br><br>
	          <input class="form-control" type="text" name="Place" id="Place" placeholder="ဥပမာ-ဆိုင္နာမည္ တစ္ခုခု">
	       </div><br>
	       <div class="form-group">
	         <span class="FieldInfo">ပံုေရြးရန္:</span><br><br>
	          <input type="File" class="form-control" name="Image" id="imageselect">
	       </div><br>
	       <div class="form-group">
	          <span class="FieldInfo">စာစု:</span><br><br>
	          <textarea class="form-control" name="Post" id="postarea"></textarea>
           </div>
	       <br><br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="စာစုအသစ္တင္ရန္">
             <br><br>
        </div>
        </div>
        </div>
        <p class="pull-center">ေက်ာက္နဲ့ကားအတြက္ တစ္ခုပဲတင္နိုင္မွာ ျဖစ္ပါတယ္ ။ </p>
        <div id="gem">
        <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h1 class="panel-title">ေက်ာက္</h1>
             </div>
             <div class="panel-body">
        <div class="form-group">
	         <span class="FieldInfo">အရြယ္အစား:</span><br><br>
	          <input type="text" class="form-control" name="model1" placeholder=" ေက်ာက္(အရြယ္အစား)">
	       </div><br>
         <div class="form-group">
	         <span class="FieldInfo">ေစ်း: ေရာင္းလိုသည့္ ေစ်းနွုန္း(၅သိန္းေအာက္)</span><br><br>
	          <input type="text" class="form-control" name="price1" placeholder="ဥပမာ- ၁၀သိန္း ဆို-->10 ရိုက္ပါ,၁၀၀သိန္း ဆို-->100 ရိုက္ပါ">
         </div><br>
         <div class="form-group">
                           <span class="FieldInfo">
                                               ေတြ့ဆံုနိုင္မည့္ အခ်ိန္ :<br><br>
                           </span>          
                           <input id="input1" class="form-control" name="date1" width="200" />
                           <script>
                               $('#input1').datetimepicker({ footer: true, modal: true });
                           </script>
                          </div><br>
           <div class="form-group">
	          <span class="FieldInfo">ေတြ့ဆံုနုိင္မည့္ ေနရာ:</span><br><br>
	          <input class="form-control" type="text" name="Place1" id="Place" placeholder="ဥပမာ-ဆိုင္နာမည္ တစ္ခုခု">
	       </div><br>
	       <div class="form-group">
	         <span class="FieldInfo">ပံုေရြးရန္:</span><br><br>
	          <input type="File" class="form-control" name="Image1" id="imageselect">
	       </div><br>
	       <div class="form-group">
	          <span class="FieldInfo">စာစု:</span><br><br>
	          <textarea class="form-control" name="Post1" id="postarea"></textarea>
           </div>
	       <br><br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit1" value="စာစုအသစ္တင္ရန္">
             <br><br>
        </div>
        <div>
        <div>
        <?php }elseif($Category == "share"){ ?>
          <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h1 class="panel-title">မိမိမွာ တစ္ျခားသူငယ္ခ်င္းမ်ားအား ေဝမွ်စရာရွိပါသလား ေအာက္တြင္ ေဝမွ်လိုေသာ အေျကာင္းအရာနွင့္ သက္ဆုိင္ရာ ပံုအား ထည့္ပါ။</h1>
             </div>
             <div class="panel-body">
          <div class="form-group">
	         <span class="FieldInfo">ပံုေရြးရန္:</span><br><br>
	          <input type="File" class="form-control" name="Image" id="imageselect">
	       </div><br>
	       <div class="form-group">
	          <span class="FieldInfo">စာစု:</span><br><br>
	          <textarea class="form-control" name="Post" id="postarea"></textarea>
           </div>
	       <br><br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="စာစုအသစ္တင္ရန္">
             <br><br>
             </div>
             </div>
        <?php }else{ ?>
          <div class="panel panel-primary">
	           <div class="panel-heading">
		            <h1 class="panel-title">မိမိေမးလိုေသာ အရာကို ပံုနွင့္ တစ္ကြ ေမးျမန္းနိုင္သည္</h1>
             </div>
             <div class="panel-body">
          <div class="form-group">
	         <span class="FieldInfo">ပံုေရြးရန္:</span><br><br>
	          <input type="File" class="form-control" name="Image" id="imageselect">
	       </div><br>
	       <div class="form-group">
	          <span class="FieldInfo">စာစု:</span><br><br>
	          <textarea class="form-control" name="Post" id="postarea"></textarea>
           </div>
	       <br><br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="စာစုအသစ္တင္ရန္">
             <br><br>
             </div>
             </div>
        <?php } ?>
	      </fieldset>
	   <br>
       </form>
      </div>
        </div>
        <div>
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