<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
   $NameError ="";
   $PasswordError = "";
   $Error = "";
   global $ConnectingDB;
   global $Connection;
   if(isset($_POST["Submit"])){
		 if($_POST["name"] == "အမည္"){
			 $NameError = '* နာမည္ ရိုက္ထည့္ရန္ လိုအပ္ပါသည္';
		 }else{
			 $Name = Test_User_Input($_POST["name"]);
       if(!preg_match("/^[A-Za-z. ]*$/",$Name)){
         $NameError = "* နာမည္ကို English စာလံုးနဲ့သာေရးပါ";
       }
		 }
	if($_POST["psw"] == "Password"){
		$PasswordError = '* စကားဝွက္ရုိက္ထည့္ရန္ လိုအပ္ပါသည္';
	}else{
		$Password= Test_User_Input($_POST["psw"]);
		if(!preg_match("/[A-Z0-9a-z.]{8,}/",$Password)){
			$PasswordError = "* စကားဝွက္အတြက္ English Letter ၈လုံးအထက္ရိုက္ထည့္ပါ";
		}
	}
	 if(($_POST["name"] != "အမည္")){
              if(preg_match("/^[A-Za-z. ]*$/",$Name)==true){
				$Found_Account=Login_Attempt_Admin($Name,$Password);
	            $_SESSION["User_IdAdmin"]=$Found_Account["id"];
				$_SESSION["UsernameAdmin"]=$Found_Account["name"];
				if($Found_Account["image"]=="")
				$_SESSION["image"] = "default.png";
				else
				$_SESSION["image"]=$Found_Account["image"];
	            if($Found_Account){
					Redirect_to("../../Back_end/Back-end(Admin Panel)/dashboard.php");
		
	            }else{
					$Error="အမည္ နွင့္ စကားဝွက္မွားယြင္းေနပါသည္ ";
	            }
		 }
	 }
	}
	 function Test_User_Input($Data){
		global $ConnectingDB;
		global $Connection;
		 return mysqli_real_escape_string($Connection,$Data);
	 }
?>
<!doctype html>
<html>
<head>
<title>G&C User Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
</head>
<body>
<div class="log">
	<div class="content1">
		<h1>Admin အေကာင့္ဝင္ရန္</h1>
		<form action="Admin.php" method= "post" >
		<div class = "Error"><?php echo $Error;?></div>
			<input type="text" name ="name" value = "အမည္" placeholder="အမည္" onfocus = "this.value='';" onblur="if(this.value == ''){this.value = 'အမည္'}">
			<div class = "Error"><?php echo $NameError;?></div>
			<input type="password" name="psw" value="Password" placeholder="စကားဝွက္" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
			<div class = "Error"><?php echo $PasswordError;?></div>
			<div class="button-row">
				<input type="submit" name="Submit" class="sign-in" value="ေလွ်ာက္လွြာ တင္ရန္">
				<div class="clear"></div>
			</div>
		</form>
		<h2></h2>
	</div>
</div>
<div class="footer">
	<p>© 2018 G & C user Login Form</p>
</div>
</body>
</html>
