<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_LoginAdmin();?>
<?php
if(isset($_POST["Submit"])){
$Title=mysqli_real_escape_string($Connection,$_POST["Title"]);
$Category=mysqli_real_escape_string($Connection,$_POST["Category"]);
$Post=mysqli_real_escape_string($Connection,$_POST["Post"]);
date_default_timezone_set("Asia/Yangon");
$CurrentTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$Admin=$_SESSION["UsernameAdmin"];
$Image=$_FILES["Image"]["name"];
$Target="Upload/".basename($_FILES["Image"]["name"]);
if(empty($Title)){
	$_SESSION["ErrorMessage"]="Title can't be empty";
	Redirect_to("AddNewPost.php");
	
}elseif(strlen($Title)<2){
	$_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
	Redirect_to("AddNewPost.php");
	
}else{
	global $ConnectingDB;
	global $Connection;
	$Query = "INSERT INTO `AdminBlog`(`id`, `datetime`, `title`, `category`,`author`,`image`,`post`) VALUES ('','$DateTime','$Title','$Category','$Admin','$Image','$Post')";
  $Execute=mysqli_query($Connection,$Query);
	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
	if($Execute){
	$_SESSION["SuccessMessage"]="Post Added Successfully";
	Redirect_to("AddNewPost.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("AddNewPost.php");
		
	}
	
}	
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Add New Post</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <div><a href="../../Fornt_end/Home/Home.php" class="logo">Admin <span class="lite">panel</span></a></div>
      <!--logo end-->

      <!-- <div class="nav search-row" id="top_menu">
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
      </div> -->

      <div class="top-nav notification-row">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            <img alt="" class = "ppimg" src="../../Fornt_end/Home/Upload/<?php echo $_SESSION['image'];?>" >
                            </span>
                            <span class="username"><?php echo $_SESSION["UsernameAdmin"];?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li>
                <a href="Logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li>
            <a class="" href="dashboard.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="ManageUser.php">
                          <i class="icon_profile"></i>
                          <span>Manage User</span>
                      </a>
          </li>
          <li>
            <a class="" href="Categories.php">
                          <i class="icon_documents_alt"></i>
                          <span>Categories</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="AddNewPost.php">
                          <i class="icon_documents_alt"></i>
                          <span>Add New Post</span>

                      </a>

          </li>

          <li>
              <a class="" href="ManageAuction.php">
                            <i class="icon_documents_alt"></i>
                            <span>Manage Auction</span>
  
                        </a>
  
            </li>
              <li>
                  <a class="" href="ManagePost.php">
                                <i class="icon_documents_alt"></i>
                                <span>Manage Post</span>
      
                            </a>
      
                </li>
                <li>
                    <a class="" href="Comment.php">
                        <i class="icon_documents_alt"></i>
                                  <span>Manage comments</span>
                                  <?php
                          global $ConnectingDB;
                          global $Connection;
                          $Query="SELECT COUNT(*) FROM comments WHERE status='OFF'";
                          $Execute=mysqli_query($Connection,$Query);
                          $Rows=mysqli_fetch_array($Execute);
                          $Total=array_shift($Rows);
                          $Query1 ="SELECT COUNT(*) FROM Comments_POST WHERE status='OFF'";
                          $Execute1=mysqli_query($Connection,$Query1);
                          $Rows1=mysqli_fetch_array($Execute1);
                          $Total1=array_shift($Rows1);
                          $Total = $Total+$Total1;
                          if($Total>0){
                          ?>
                          <span class="label  label-danger">
                          <?php echo $Total;?>
                           </span>
		
        <?php } ?>
                              </a>
        
                  </li>
                  <li>
                    <a class="" href="Message.php">
                                  <i class="icon_documents_alt"></i>
                                  <span>Message</span>
                                  <?php
                          global $ConnectingDB;
                          global $Connection;
                          $Query2="SELECT COUNT(*) FROM `Message` WHERE `read`='NO'";
                          $Execute2=mysqli_query($Connection,$Query2);
                          $Rows2=mysqli_fetch_array($Execute2);
                          $Total2=array_shift($Rows2);
                          if($Total2>0){
                          ?>
                          <span class="label  label-danger">
                          <?php echo $Total2;?>
                           </span>
		
        <?php } ?>
        
                              </a>
        
                  </li>
                  <li>
                    <a class="" href="Admin.php">
                                  <i class="icon_profile"></i>
                                  <span>Manage Admin</span>
        
                              </a>
        
                  </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
</aside>
<!-- <end slide area>  -->
<section id="main-content">
  <section class="wrapper">
	<div class = "row">
	   <div class="col-lg-12">
            <h1><i class="icon_document_alt"></i> Add new post</h1>
            <div class="col-sm-10">
	           <?php echo Message();
	            echo SuccessMessage();
	           ?>
                   <div>
    <form action="AddNewPost.php" method="post" enctype="multipart/form-data">
	  <fieldset>
	       <div class="form-group">
	        <label for="title"><span class="FieldInfo"><br>Title:</span></label>
	        <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
	       </div>
	      <div class="form-group">
	      <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
	      <select class="form-control" id="categoryselect" name="Category" >
	        <?php
				global $ConnectingDB;
				global $Connection;
                $ViewQuery="SELECT * FROM category ORDER BY datetime desc";
                $Execute=mysqli_query($Connection,$ViewQuery);
                while($DataRows=mysqli_fetch_array($Execute)){
	               $Id=$DataRows["Cat_id"];
	               $CategoryName=$DataRows["name"];
            ?>	
	        <option><?php echo $CategoryName; ?></option>
	        <?php } ?>
		  </select>
	    </div>
	    <div class="form-group">
	       <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
	       <input type="File" class="form-control" name="Image" id="imageselect">
	    </div>
	    <div class="form-group">
	       <label for="postarea"><span class="FieldInfo">Post:</span></label>
	       <textarea class="form-control" name="Post" id="postarea"></textarea>
      </div>
	     <br>
           <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
	  </fieldset>
	 <br>
    </form>
</div>
            </div>
        </div>
	</div>
  </section>
</section>
    <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>

</body>

</html>