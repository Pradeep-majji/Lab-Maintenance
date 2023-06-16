<?php
include("connect.php");
if(isset($_POST['submit'])){
    $new_token=md5(rand());
    $email=$_POST['email'];
    $token=$_POST['token'];
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password=password_hash($password,PASSWORD_DEFAULT);
    $checkemail="select email from teacher where email='$email' and token='$token' limit 1";
    $check_email_run=mysqli_query($conn,$checkemail);
    if(mysqli_num_rows($check_email_run)>0){
        $update_password="update teacher set password='$password' where email='$email' and token='$token' limit 1";
        $update_token="update teacher set token='$new_token' where email='$email' and token='$token' limit 1";
        $update_password_run=mysqli_query($conn,$update_password);
        if($update_password_run){
        mysqli_query($conn,$update_token);
        header("Location:login.php?sucess=password updated successfully");
        exit();
        }
        else{
        header("Location:newpassword.php?error=something went wrong");
        exit();
        }
    }
    else{
        header("Location:newpassword.php?error=you dont have an account or invalid link&email=$email&token=$token");
        exit();
    }

}
$conn->close();
?>