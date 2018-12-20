<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
      $CodeError = "";
      $Email = $_GET['Email'];
      $Name= $_GET['Name'];
      $PhoneNumber=$_GET['Phone'];
      $city = $_GET['City'];
      $Radio = $_GET['Gender'];
      $Check = $_GET['Trader'];
      $Password = $_GET['Password'];
      $code = $_GET['Code'];
      $ability = $_GET['Ability'];
  if(isset($_POST['Submit'])){
      if(empty($_POST['confrim'])){
          $CodeError = "ကုတ္နံပါတ္ရိုက္ထည့္ရန္ လိုအပ္ပါသည္";
      }else{
          $code1 = Test_User_Input($_POST['confrim']);
          if(preg_match("/[0-9]{6}/",$code1)){
            if($code == $code1){
                $Connection = mysqli_connect("localhost","root","","G&C_Record");
              if($ability == ""){
                $Query="INSERT INTO `User`(`id`, `name`, `Phone Number`, `Email`, `Gender`, `Trader`, `Address`, `password`,`image`,`Flag`) VALUES ('','$Name','$PhoneNumber','$Email','$Radio','$Check','$city','$Password','default.png','NO')";
                $Execute = mysqli_query($Connection,$Query);
                $_SESSION["Username"] = $Name;
                Redirect_to("../Home/Home.php");
              }else{
                $Query="INSERT INTO `User`(`id`, `name`, `Phone Number`, `Email`, `Gender`, `Trader`, `Ability`, `Address`,`password`,`image`,`Flag`) VALUES ('','$Name','$PhoneNumber','$Email','$Radio','$Check','$ability','$city','$Password','default.png','YES')";
                $Execute = mysqli_query($Connection,$Query);
                if($Execute){
                    $_SESSION["Username"] = $Name;
                    Redirect_to("../Home/Home.php");
                }else{
                    $CodeError="တစ္ခုခုမွားေနပါသည္။ေက်းဇူးျပု၍ ထပ္မံလုပ္ေဆာင္ပါ။";
                }
              }
            }else{
                echo $code;
                $CodeError = "မိတ္ေဆြရိုက္ထည့္ေသာ ကုတ္နံပါတ္သည္ မိတ္ေဆြသုိ့ ေပးပို့ထားေသာ ကုတ္နံပါတ္နွင့္ တူညီမွုမရွိပါ";
            }
          }else{
              $CodeError= "ကုတ္နံပါတ္ မမွန္ကန္ပါ။ အားလုံးေပါင္း ၆လံုးရွိရပါမည္";
          }
      }
  }
  function Test_User_Input($Data){
    return $Data;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Comfrimaion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='//fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
</head>
<body>
<div class = "log">
    <div class = "content2">
    <h1>သင့္အေကာင့္အသစ္ကို အတည္ျပုရန္</h1><br><br>
    <form action ="code_vaildation.php?Email=<?php echo rawurlencode($Email);?>&Name=<?php echo rawurlencode($Name);?>&Phone=<?php echo rawurlencode($PhoneNumber);?>&City=<?php echo rawurlencode($city);?>&Password=<?php echo rawurlencode($Password);?>&Trader=<?php echo rawurlencode($Check);?>&Gender=<?php echo rawurlencode($Radio);?>&Ability=<?php echo rawurlencode($ability);?>&Code=<?php echo rawurlencode($code);?>" method = "post">
         <label class = "lbtext"> မိတ္ေဆြ၏ အီးေမး သို့မဟုတ္ ဖုန္းနံပါတ္သို့ ပို့လာေသာ ကုတ္နံပါတ္ကို ရိုက္ထည့္ပါ </label>
         <input type = "text" name = "confrim" placeholder = "ကုတ္နံပါတ္ရိုက္ထည့္ပါ">
         <div class = "Error"><?php echo $CodeError;?></div>
         <input type = "submit" value = "အတည္ျပုရန္" name="Submit" class="register">
    </form>
    <h2><a href="sentCode.php?Email=<?php echo rawurlencode($Email);?>&Name=<?php echo rawurlencode($Name);?>&Phone=<?php echo rawurlencode($PhoneNumber);?>&City=<?php echo rawurlencode($city);?>&Password=<?php echo rawurlencode($Password);?>&Trader=<?php echo rawurlencode($Check);?>&Gender=<?php echo rawurlencode($Radio);?>&Ability=<?php echo rawurlencode($ability);?>&Code=<?php echo rawurlencode($code);?>" class = "recode">ကုတ္နံပါတ္ ထပ္မံပို့ရန္</a></h2>
    </div>
</div>
</body>
</html>