<?php
$Email = "";
  $code = 0;
  function sentMail($Email){
      $Email = $_GET['Email'];
      $Name= $_GET['Name'];
      $PhoneNumber=$_GET['Phone'];
      $city = $_GET['City'];
      $Radio = $_GET['Gender'];
      $Check = $_GET['Trader'];
      $Password = $_GET['Password'];
      $ability = $_GET['Ability'];
       $code = rand(100000,999999);
       require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
       require '/usr/share/php/libphp-phpmailer/class.smtp.php';
       $mail = new PHPMailer;
       $mail->setFrom('admin@example.com');
       $mail->addAddress($Email);
       $mail->Subject = "Account Confrimation";
       $mail->Body = "မိတ္ေဆြ အေကာင့္အတည္ျပုဖို့လိုအပ္ပါသည္ ယခုပို့လိုက္ေသာ ကုတ္ျဖင့္ အတည္ျပုပါ ။ကုတ္နံပါတ္မွာ {$code} ျဖစ္သည္ ။";
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
           echo 'Email is not sent.';
           echo 'Email error: ' . $mail->ErrorInfo;
       } else {
        function redirect_to($NewLocation){
            header("Location:".$NewLocation);
            exit;
        }
        redirect_to("code_vaildation.php?Email=$Email&Name=$Name&Phone=$PhoneNumber&City=$city&Password=$Password&Trader=$Check&Gender=$Radio&Ability=$ability&Code=$code");
        } 
    }
    sentMail($Email);
  ?>