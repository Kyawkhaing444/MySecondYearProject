<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	exit;
}

function Login_Attempt($Username,$Password){
    global $ConnectingDB;
    global $Connection;
    $Query="SELECT * FROM User
    WHERE name='$Username' AND password='$Password'";
    $Execute=mysqli_query($Connection,$Query);
    if($admin=mysqli_fetch_assoc($Execute)){
	return $admin;
    }else{
	return null;
    }
}
function Login_Attempt_Admin($Username,$Password){
    global $ConnectingDB;
    global $Connection;
    $Query="SELECT `User_id` FROM `Admin` WHERE `name` = '$Username'";
    $Execute=mysqli_query($Connection,$Query);
    while($Data = mysqli_fetch_array($Execute)){
       $User_id = $Data['User_id'];
    }
    $Query1 = "SELECT * FROM User WHERE id = '$User_id' AND password='$Password' ";
    $Execute1=mysqli_query($Connection,$Query1);
    if($admin = mysqli_fetch_assoc($Execute1)){
         return $admin;
    }else{
        return null;
    }
}
function Login(){
    if(isset($_SESSION["User_Id"])){
	return true;
    }
}
 function Confirm_Login(){
    if(!Login()){
	$_SESSION["ErrorMessage"]="အေကာင့္ဝင္ဖုိ့ လိုပါသည္ ! ";
	Redirect_to("choice.php");
    }
    
 }
 function LoginAdmin(){
    if(isset($_SESSION["User_IdAdmin"])){
	return true;
    }
}
 function Confirm_LoginAdmin(){
    if(!LoginAdmin()){
	$_SESSION["ErrorMessage"]="အေကာင့္ဝင္ဖုိ့ လိုပါသည္ ! ";
	Redirect_to("Admin.php");
    }
    
 }



?>