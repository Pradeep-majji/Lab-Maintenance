<?php
include "connect.php";
function clear($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$email=clear($_POST['email']);
$otp=clear($_POST['otp']);
$sql="select otp from teacher where email='$email' and verify=0";
$result=$conn->query($sql);
if(mysqli_num_rows($result)===1)
{
    $row=mysqli_fetch_assoc($result);
    if($row['otp']===$otp)
    {
        $update_verify="update teacher set verify=1 where email='$email' limit 1";
        $update_verify_run=mysqli_query($conn,$update_verify);
        if($update_verify_run){
        header("Location:labsignup.php?sucess=registered successfully");
        exit();
        }
        else
        {
            header("Location:labsignup.php?error=something went wrong");
            exit();
        }
    }
    else{
        header("Location:enterotp.php?error=incorrect otp&email=$email");
        exit();
    }
}
else{
    header("Location:labsignup.php?error=Account not found");
    exit();
}
$conn->close();
?>

