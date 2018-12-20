<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_GET["id"])){
	$IdFromURL=$_GET["id"];
	global $ConnectingDB;
	global $Connection;
    $Query="DELETE FROM Comments_POST WHERE id='$IdFromURL' ";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
	  $_SESSION["SuccessMessage"]="Delete Comment Successfully";
	  Redirect_to("Comment.php");
	  }else{
	  $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	  Redirect_to("Comment.php");
	  }
}

?>