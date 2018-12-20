<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
$RadioError = "";
if(isset($_POST["Submit"])){
   if(empty($_POST["User"])){
       $RadioError="ေရြးရန္လိုအပ္ပါသည္ ။";
   }else{
       $Radio = Test_User_Input($_POST["User"]);
       if($Radio == "user"){
         redirect_to("Login_Form.php");
       }elseif($Radio == "Supervisor"){
           redirect_to("Supervisor Login Form.php");
       }
   }
}
function Test_User_Input($Data){
    return $Data;
}
?>
<!doctype html>
<html>
<head>
<title>G&C trading</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
</head>
<body>
<div class="log">
	<div class="content1">
        <h1>
          အေကာင့္ဝင္ရန္ လိုအပ္ပါသည္ !
        </h1>
		<form action="choice.php" method= "post" >
                <label style="color:white;" name = "radio"><input type="Radio" name="User" value = "user" >  အသံုးျပုသူအေကာင့္ဝင္ရန္</label>
                <label style="color:white;" name = "radio"><input type="Radio" name="User" value = "Supervisor">  ပြဲစားဝန္ထမ္းအေကာင့္ဝင္ရန္</label>
                <div class="Error"><?php echo $RadioError;?></div>
                <br><br>
                <input type="submit" name="Submit" class="sign-in" value="ဆက္သြားရန္">
                <br><br><br><br>
			</div>
</form>
    </div>
    <div style="height:5%;"></div>
</div>
</body>
</html>
