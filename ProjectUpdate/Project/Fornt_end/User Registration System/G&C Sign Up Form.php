<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
   $NameError ="";
   $EmailError = "";
   $PasswordError = "";
   $BankNoError = "";
   $PhoneError = "";
   $cityError = "";
   $PasswordError1 = "";
   $RadioError = "";
   $CheckError = "";
   $Password = "";
   if(isset($_POST["Submit"])){
		 if($_POST["name"] == "အမည္"){
			 $NameError = '* နာမည္ ရိုက္ထည့္ရန္ လိုအပ္ပါသည္';
		 }else{
			 $Name = Test_User_Input($_POST["name"]);
       if(!preg_match("/^[A-Za-z. ]*$/",$Name)){
         $NameError = "* နာမည္ကို English စာလံုး နဲ့သာေရးပါ";
       }
		 }
     if($_POST["email"] == "အီးေမးလိပ္စာ"){
			 $EmailError = "* အီးေမးလိပ္စာ ရိုက္ထည့္ရန္ လိုအပ္ပါသည္";
		 }else{
			 $Email = Test_User_Input($_POST["email"]);
       if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)){
         $EmailError = "* အီးေမးလိပ္စာ ပံုစံမမွန္ကန္ပါ ဥပမာ- usr122@example.com";
       }
	}
	if(empty($_POST['Gender'])){
		$RadioError = '<br>* က်ား၊မ ေရြးရန္လိုအပ္ပါသည္';
	    }else{
		$Radio = Test_User_Input($_POST["Gender"]);
    }
	if(empty($_POST["Trader"])){
		$CheckError = '<br>* ကုန္သည္ အမ်ိုးအစားေရြးရန္ လိုအပ္ပါသည္';
	}else{
		$Check = Test_User_Input($_POST["Trader"]);
	}
	if($_POST["psw"] == "Password"){
		$PasswordError = '* စကားဝွက္ရုိက္ထည့္ရန္ လိုအပ္ပါသည္';
	}else{
		$Password= Test_User_Input($_POST["psw"]);
		if(!preg_match("/[A-Z0-9a-z.]{8,}/",$Password)){
			$PasswordError = "* စကားဝွက္အတြက္ English စာလံုး ၈လုံးအထက္ရိုက္ထည့္ပါ";
		}
	}
	if($_POST["psw1"] == "Comfrim Password"){
		$PasswordError1 = '* စကားဝွက္ရုိက္ထည့္ရန္ လိုအပ္ပါသည္';
	}else{
		$Password1= Test_User_Input($_POST["psw1"]);
		if(!preg_match("/[A-Z0-9a-z.]{8,}/",$Password1)){
			$PasswordError1 = "* စကားဝွက္အတြက္ English စာလံုး ၈လုံးအထက္ရိုက္ထည့္ပါ";
		}else{
	    if($Password != $Password1){
				$PasswordError1 = "* ပထမစကားဝွက္နဲ့ ကိုက္ညီမွု မရွိပါ ၊ ေက်းဇူးျပု၍ ျပန္ရိုက္ထည့္ပါ ";
		}
	  }
	}
	// if($_POST["BankNo"] == "ဘဏ္အေကာင့္နံပါတ္"){
	// 	$BankNoError = '*ဘဏ္အေကာင့္နံပါတ္ ရိုက္ထည့္ရန္ လိုအပ္ပါသည္';
	// }else{
	// 	$BankNo = Test_User_Input($_POST["BankNo"]);
    //     if(!preg_match("/[0-9]{3}\-[0-9]{3}\-[0-9]{11}/",$BankNo)){
	//       $BankNoError = "*ဘဏ္အေကာင့္နံပါတ္ မွားယြင္းေနပါသည္";
    //     }
    // }
    if($_POST["usrtel"] == "ဖုန္းနံပါတ္"){
	    $PhoneError = '*ဖုန္းနံပါတ္ ရိုက္ထည့္ရန္ လုိအပ္ပါသည္';
    }else{
	     $PhoneNumber = Test_User_Input($_POST["usrtel"]);
        if(!preg_match("/[0-9]{5,}/",$PhoneNumber)){
          $PhoneError = "*ဖုန္းနံပါတ္ မွားယြင္းေနပါသည္";
        }
    }
    if($_POST["city"] == "ေနရပ္လိပ္စာအျပည့္အစံု"){
	     $cityError = '* ေနရပ္လိပ္စာ ရိုက္ထည့္ရန္လိုအပ္ပါသည္ ';
    }else{
	     $city = Test_User_Input($_POST["city"]);
    }
  if(($_POST["name"] != "အမည္")&&($_POST["email"] != "အီးေမးလိပ္စာ")){
	    if(preg_match("/^[A-Za-z. ]*$/",$Name)==true && preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)&& !empty($Radio) && !empty($Check) && preg_match("/[A-Z0-9a-z.]{8,}/",$Password) && preg_match("/[A-Z0-9a-z.]{8,}/",$Password1) && ($Password == $Password1)&& preg_match("/[0-9]{5,}/",$PhoneNumber)&&!empty($city)){
				Redirect_to("sentCode.php?Email=$Email&Name=$Name&Phone=$PhoneNumber&City=$city&Password=$Password&Trader=$Check&Gender=$Radio&Ability=$ability&Code=$code");
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
<title>G&C User Sign Up Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
<!-- /font files  -->
<!-- css files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
</head>
<body>
<div class="log">
	<div class="social">
		<li class="f"><a href="#"><img src="images/fb.png" alt=""></a></li>
		<li class="t"><a href="#"><img src="images/twt.png" alt=""></a></li>
		<li class="p"><a href="#"><img src="images/pin.png" alt=""></a></li>
		<li class="i"><a href="#"><img src="images/ins.png" alt=""></a></li>
		<div class="clear"></div>
	</div>
	<div class="content2">
		<h1>အေကာင့္အသစ္ေလွ်ာက္ရန္</h1>
		<form action="G&C Sign Up Form.php" method="post">
			<input type="text" name="name" placeholder = "အမည္" value="အမည္" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'အမည္';}">
			<div class="Error"><?php echo $NameError;?></div>
			<input type="tel" name="usrtel" placeholder = "ဖုန္းနံပါတ္" value="ဖုန္းနံပါတ္" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ဖုန္းနံပါတ္';}">
			<div class = "Error"><?php echo $PhoneError;?></div>
			<input type="text" name="email" placeholder = "အီးေမးလိပ္စာ" value="အီးေမးလိပ္စာ" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'အီေမးလိပ္စာ';}">
			<div class="Error"><?php echo $EmailError;?></div><br><br>
			<label class = "radio" name = "radio"><input type="Radio" name="Gender" value = "Male" > အမ်ိုးသား<input type="Radio" name="Gender" value = "FeMale"> အမ်ိုးသမီး</label>
		    <div class="Error"><?php echo $RadioError;?></div><br><br>
			<label class = "check" name = "check">ကုန္သည္အမ်ိုးအစား:<input type="CheckBox" name="Trader" value = "Gem" > ေက်ာက္<input type="CheckBox" name="Trader" value = "Car"> ကား</label>
			<!-- <input type="text" name="BankNo" placeholder = "ဘဏ္အေကာင့္နံပါတ္" Value = "ဘဏ္အေကာင့္နံပါတ္" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ဘဏ္အေကာင့္နံပါတ္';}">
			<div class = "Error"><?php echo $BankNoError;?></div> -->
            <div class = "Error"><?php echo $CheckError;?></div><br>
			<input type="text" name="city" placeholder = "ေနရပ္လိပ္စာအျပည့္အစံု" Value = "ေနရပ္လိပ္စာအျပည့္အစံု" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ေနရပ္လိပ္စာအျပည့္အစံု';}">
			<div class = "Error"><?php echo $cityError;?></div>
			<input type="password" name="psw" placeholder = "စကားဝွက္" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
			<div class="Error"><?php echo $PasswordError;?></div>
			<input type="password" name="psw1" placeholder = "စကားဝွက္ကို အတည္ျပုရန္ ျပန္ရိုက္ထည့္ပါ" value="Comfrim Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Comfrim password';}">
			<div class="Error"><?php echo $PasswordError1;?></div>
			<input type="submit" name="Submit" class="register" value="ေလွ်ာက္လွြာ တင္ရန္">
		</form>
		<h2><a href="Login_Form.php">ရွိျပီးသား အေကာင့္ကို ဝင္ရန္</a></h2>
	</div>
</div>
<div class="footer">
	<p>© 2018 G&C User Sign Up Form</p>
</div>

</body>
</html>