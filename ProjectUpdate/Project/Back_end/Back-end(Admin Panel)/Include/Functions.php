<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	exit;
}

function Login_Attempt($Username,$Password){
    $ConnectingDB;
    $Query="SELECT * FROM Admin
    WHERE name='$Username' AND password='$Password'";
    $Execute=mysqli_query($Query);
    if($admin=mysql_fetch_assoc($Execute)){
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
	Redirect_to("../../Fornt_end/User Registration System/Admin.php");
    }
    
 }
 function LoginAdmin(){
    if(isset($_SESSION["User_IdAdmin"])){
	return true;
    }
}
 function Confirm_LoginAdmin(){
    if(!LoginAdmin()){
	Redirect_to("../../Fornt_end/User Registration System/Admin.php");
    }
    
 }
 function sentMail($Email,$Subject,$Message,$File_name,$getname){
     require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
     require '/usr/share/php/libphp-phpmailer/class.smtp.php';
     $mail = new PHPMailer;
     $mail->setFrom('admin@example.com');
     $mail->addAddress($Email);
     $mail->Subject=$Subject;
     $mail->Body=$Message;
     $mail->IsSMTP();
     $mail->SMTPSecure = 'ssl';
     $mail->Host = 'ssl://smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Port = 465;
     //Set your existing gmail address as user name
              $mail->Username ='gandctrading1@gmail.com';

     //Set the password of your gmail address here
              $mail->Password = 'g&ctrading099657';
     if(!$mail->send()) {
         $_SESSION["ErrorMessage"] = 'Email is not sent.'.'<br>'.'Email error: ' . $mail->ErrorInfo;
         Redirect_to("{$File_name}?{$getname}={$Email}");
     } else {
         $_SESSION["SuccessMessage"] = 'Email has been sent';
         Redirect_to("{$File_name}?{$getname}={$Email}");
    } 
  }




?>