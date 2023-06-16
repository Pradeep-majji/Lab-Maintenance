<?php
include "connect.php";
if((isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])))
{
    function clear($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
}
$username=clear($_POST['username']);
$email=clear($_POST['email']);
$password=password_hash(clear($_POST['password']),PASSWORD_DEFAULT);
$sql="select email from teacher where email='$email'";
$result=$conn->query($sql);
if(mysqli_num_rows($result)===1)
{
     header("Location:signup1.php?error=already registered");
    exit();
}
else{
$sql="insert into teacher(username,email,password) values('$username','$email','$password')";
$result=$conn->query($sql);
if($result==TRUE)
{
    header("Location:signup1.php?error=successfully registered");
    exit();
}
}
$conn->close();
?>