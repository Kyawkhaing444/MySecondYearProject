<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_GET["Delete"])){
	$IdFromURL=$_GET["Delete"];
	global $ConnectingDB;
	global $Connection;
    $Query="DELETE FROM `User` WHERE `id`='$IdFromURL'";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
	  $_SESSION["SuccessMessage"]="Delete User Successfully";
	  Redirect_to("ManageUser.php");
	  }else{
	  $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	  Redirect_to("ManageUser.php");
	  }
}

?>