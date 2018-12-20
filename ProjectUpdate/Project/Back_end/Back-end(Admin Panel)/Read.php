<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_GET["id"])){
	$IdFromURL=$_GET["id"];
	global $ConnectingDB;
	global $Connection;
	$_SESSION["Username"] = "Kyaw Kyaw Khaing";
    $Admin=$_SESSION["Username"];
    $Query="UPDATE `Message` SET `read`='YES' WHERE id='$IdFromURL' ";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
	  $_SESSION["SuccessMessage"]="Message Read Successfully";
	  Redirect_to("Message.php");
	  }else{
	  $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	  Redirect_to("Message.php");
	  }
}

?>