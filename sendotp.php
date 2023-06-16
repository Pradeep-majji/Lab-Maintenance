<?php
session_start();
include("connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_otp($get_username,$get_email,$otp){
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
    $mail->Subject = 'OTP FOR REGISTRATION';
    $email_template="
    <h2>Hello</h2>
    <h3>Your are reciving this email because you are signed up</h3>
    <br><br>
    <h2>'.$otp.'</h2>
    ";
    $mail->Body  = $email_template;

    if($mail->send())
    {
         echo "<script>alert('check your mail for verification code')</script>";
         header("Location:enterotp.php?email=$get_email");
         exit();

    }
    else{
          header("Location:labsignup.php?error=something went wrong");
          exit();
    }
}

if(isset($_POST['submit'])){
    function clear($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $email=clear($_POST['email']);
    $name=clear($_POST['name']);
    $password=password_hash(clear($_POST['password']),PASSWORD_DEFAULT);
    $token=md5(rand());
    $otp=rand(100000,999999);
    $verify=0;
    $sql="select email,verify from teacher where email='$email'";
    $result=$conn->query($sql);
    if(mysqli_num_rows($result)===1 && mysqli_fetch_assoc($result)['verify']==1)
    {
         header("Location:labsignup.php?error=already registered");
        exit();
    }
    elseif(mysqli_num_rows($result)===1 && mysqli_fetch_assoc($result)['verify']==0)
    {
        $msql="delete from teacher where email='$email'";
        $run=$conn->query($msql);
        if($run)
        {
            $insert="insert into teacher(name,email,password,token,otp,verify) values('$name','$email','$password','$token','$otp','$verify') ";
            $insert_run=mysqli_query($conn,$insert);
            if($insert_run){
                send_otp($name,$email,$otp);
            }
            else{
                header("Location:labsignup.php?error=try again, something went wrong");
                exit();
            }
        }
        else{
            header("Location:labsignup.php?error=try again, something went wrong");
            exit();
        }
    }
    else
    {
    $insert="insert into teacher(name,email,password,token,otp,verify) values('$name','$email','$password','$token','$otp','$verify') ";
    $insert_run=mysqli_query($conn,$insert);
    if($insert_run){
        send_otp($name,$email,$otp);
    }
    else{
        header("Location:labsignup.php?error=try again, something went wrong");
        exit();
    }
    }
}
$conn->close();
?>