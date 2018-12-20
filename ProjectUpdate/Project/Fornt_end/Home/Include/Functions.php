<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	exit;
}
function sentMail($Email1,$code){
    require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
    require '/usr/share/php/libphp-phpmailer/class.smtp.php';
    $mail = new PHPMailer;
    try{
    $mail->setFrom('admin@example.com');
    $mail->addAddress($Email1);
    $mail->Subject="Auction Confrimation";
    $mail->Body= "လူျကီးမင္းသည္ ခုပို့လာေသာ ကုတ္နံပါတ္ျဖင့္ ပြဲစားမ်ားအား မဲေပးရန္ တြင္ သြားျပီး မဲေပးနိုင္ပါသည္ ။ <br>
    လူျကီးမင္း၏ မဲေပးမွုျဖင့္ ပြဲစားမ်ား၏ အရည္အခ်င္းကို ဆံုးျဖတ္ေပးမွာ ျဖစ္တာေျကာင့္ မဲေပးရန္ ေမတဿတာရပ္ခံအပ္ပါသည္<br>
    ကုတ္နံပါတ္မွာ - {$code}";
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    //Set your existing gmail address as user name
             $mail->Username ='kyawaung121212@gmail.com';

    //Set the password of your gmail address here
             $mail->Password = 'kyaw123456789101112';
    if(!$mail->send()) {
        $_SESSION["ErrorMessage"] = 'Email is not sent.'.'<br>'.'Email error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $_SESSION["SuccessMessage"] = 'Email has been sent';
        return true;
   } 
}catch (Exception $e) {
   return true;
}
 }
 function sentMail1($Email1,$code){
    $mail = new PHPMailer;
    try{
    $mail->setFrom('admin@example.com');
    $mail->addAddress($Email1);
    $mail->Subject="Auction Confrimation";
    $mail->Body= "လူျကီးမင္းသည္ ခုပို့လာေသာ ကုတ္နံပါတ္ျဖင့္ ပြဲစားမ်ားအား မဲေပးရန္ တြင္ သြားျပီး မဲေပးနိုင္ပါသည္ ။ <br>
    လူျကီးမင္း၏ မဲေပးမွုျဖင့္ ပြဲစားမ်ား၏ အရည္အခ်င္းကို ဆံုးျဖတ္ေပးမွာ ျဖစ္တာေျကာင့္ မဲေပးရန္ ေမတဿတာရပ္ခံအပ္ပါသည္<br>
    ကုတ္နံပါတ္မွာ - {$code}";
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    //Set your existing gmail address as user name
             $mail->Username ='kyawaung121212@gmail.com';

    //Set the password of your gmail address here
             $mail->Password = 'kyaw123456789101112';
    if(!$mail->send()) {
        $_SESSION["ErrorMessage"] = 'Email is not sent.'.'<br>'.'Email error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $_SESSION["SuccessMessage"] = 'Email has been sent';
        return true;
   } 
}catch (Exception $e) {
    return true;
 }
}
function isexit($Username,$email){
    global $ConnectingDB;
    global $Connection;
    $Query="SELECT * FROM User
    WHERE name='$Username' AND Email='$email'";
    $Execute=mysqli_query($Connection,$Query);
    if($admin=mysqli_fetch_assoc($Execute)){
	return $admin;
    }else{
	return null;
    }
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
	Redirect_to("../User Registration System/choice.php");
    }
    
 }
?>