<?php
include "../ConnexionDB.php";
session_start();


function smtp_mailer($to, $subject, $msg){  
    require_once("../../PHPMailer-5.2-stable/PHPMailerAutoload.php");  
    $mail = new PHPMailer();  
    $mail->isSMTP();   
    $mail->SMTPAuth = true;  
    $mail->SMTPSecure = 'TLS';  
    $mail->Host = "smtp.gmail.com";  
    $mail->Port = 587;  
    $mail->IsHTML(true);  
    $mail->CharSet = 'UTF-8';  
    $mail->Username = 'johnpayeapp@gmail.com';   
    $mail->Password = 'azer.tyui';   
    $mail->setFrom('Emil', 'Test');  
    $mail->Subject = $subject;  
    $mail->Body = $msg;  
    $mail->AddAddress($to);  
    if(!$mail->send()) {  
      echo 'Message could not be sent.';  
      echo 'Mailer Error: ' . $mail->ErrorInfo;  
    } else {  
      echo 'send';  
    }  
}  


$req = $db->prepare("select * from users where email = ?");
$req->execute([$_POST['email']]);
if($user=$req->fetch()){
  $code=random_int(10000000,99999999);
  $req = $db->prepare("update users set code=? where email = ?");
  $req->execute([$code,$_POST['email']]);
  smtp_mailer($_POST['email'],"Reset Password","This is your code\n$code");
  $_SESSION['id_reset']=$user['id'];
  header("location: ../../Views/Authentification/enter-code.php");
}else{
    echo "This email is not registred yet!";
}











