<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_GET["Delete"])){
	$IdFromURL=$_GET["Delete"];
	global $ConnectingDB;
	global $Connection;
    $Query="DELETE FROM `Confrimed_Auction` WHERE `id`='$IdFromURL'";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
	  $_SESSION["SuccessMessage"]="Delete Auction Successfully";
	  Redirect_to("ManageAuction.php");
	  }else{
	  $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	  Redirect_to("ManageAuction.php");
	  }
}

?>