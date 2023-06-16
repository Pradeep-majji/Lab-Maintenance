<?php
session_start();
include "connect.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_otp($email,$status,$conn){
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pradeepmajji42@gmail.com';                     //SMTP username
    $mail->Password   = 'jkefoxawofbmuwkl';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pradeepmajji42@gmail.com', $email);
    $mail->addAddress($email);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'STATUS FOF MEMBERSHIP';
    if($status==1)
    {
    $email_template="
    <h2>Hello</h2>
    <h3>Your ace memebership sucessfully aproved</h3>
    ";
    }
    else{
        $email_template="
        <h2>Hello</h2>
        <h3>Your ace memebership not-aproved, pls contract to respective body members</h3>
        ";
    }
    $mail->Body  = $email_template;

    if($mail->send())
    {
        if($status==1)
        {
        $sql="update member set status=1 where email='$email'";
        $record=mysqli_query($conn,$sql);
        if($record)
        {
         header("Location:preview.php?error=mail sent sucessfully");
         exit();
        }
        else{
            header("Location:preview.php?error=something wrong");
            exit();  
        }
        }
        else{
            header("Location:preview.php?error=mail sent sucessfully");
            exit(); 
        }

    }
    else{
          header("Location:preview.php?error=something wrong");
          exit();
    }
}
if(isset($_POST['email']) && isset($_POST['submit']))
{
    $email=$_POST['email'];
    $status=$_POST['submit'];
    send_otp($email,$status,$conn);
}
$conn->close();
?>