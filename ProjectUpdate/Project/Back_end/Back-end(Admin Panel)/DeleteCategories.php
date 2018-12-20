<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_GET["id"])){
	$IdFromURL=$_GET["id"];
	global $ConnectingDB;
	global $Connection;
    $Query="DELETE FROM category WHERE Cat_id = '$IdFromURL'";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
	  $_SESSION["SuccessMessage"]="Delete Category Successfully";
	  Redirect_to("Categories.php");
	  }else{
	  $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	  Redirect_to("Categories.php");
	  }
}

?>