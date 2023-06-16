<?php
session_start();
include("connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_username,$get_email,$token){
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pradeepmajji42@gmail.com';                     //SMTP username
    $mail->Password   = 'jkefoxawofbmuwkl';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pradeepmajji42@gmail.com', $get_username);
    $mail->addAddress($get_email);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password notification';
    $email_template="
    <h2>Hello</h2>
    <h3>Your are reciving this email because we recived a reset password request from your account</h3>
    <br><br>
    <a href='http://localhost/msdslab/newpassword.php?token=$token&email=$get_email'>Click me</a>
    ";
    $mail->Body  = $email_template;

    $mail->send();
}

if(isset($_POST['reset'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $token=md5(rand());
    $checkemail="select name,email from teacher where email='$email' limit 1";
    $check_email_run=mysqli_query($conn,$checkemail);
    if(mysqli_num_rows($check_email_run)>0){
        $row=mysqli_fetch_array($check_email_run);
        $get_email=$row['email'];
        $get_username=$row['name'];
        $update_token="update teacher set token='$token' where email='$get_email' limit 1";
        $update_token_run=mysqli_query($conn,$update_token);
        if($update_token_run){
            send_password_reset($get_username,$get_email,$token);
           # $_SESSION['status']="we emailed you a password link";
        header("Location:forgetpassword.php?sucess=we emailed you the reset password link");
        exit();
        }
        else{
        header("Location:forgetpassword.php?error=something went wrong");
        exit();
        }
    }
    else{
        header("Location:forgetpassword.php?error=account not found");
        exit();
    }

}
?>