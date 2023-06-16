<?php
include "connect.php";
if((isset($_POST['email'])&&isset($_POST['password'])))
{
    function clear($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
$email=clear($_POST['email']);
$password=clear($_POST['password']);
if(empty($email)){
    header("Location:login.php?error=enter the email");
    exit();
}
if(empty($password)){
    header("Location:login.php?error=enter the password");
    exit();
}
$sql="select email,password,verify from teacher where email='$email'";
$result=$conn->query($sql);
if(mysqli_num_rows($result)===1)
{
    $row=mysqli_fetch_assoc($result);
    if($row['email']===$email && password_verify($password,$row['password'])&& $row['verify']==1)
    {
    header("Location:adminbutton.php");
    exit();
    }
    else{
        header("Location:adminlogin.php?error= your account is not verified or you entered invalid credentials");
        exit();
    }
}
else{
    header("Location:adminlogin.php?error=account not found");
    exit();
}
}
$conn->close();
?>