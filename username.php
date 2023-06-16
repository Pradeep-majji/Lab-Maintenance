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
$password=clear($_POST['password']);
$sql="select name as name from users where email='$email'";
$result=$conn->query($sql);
if(mysqli_num_rows($result)===1)
{
$name=mysqli_fetch_assoc($result)['name'];
echo "WelCome ".$name;
}
else
{
header("Location:userlogin.html");
exit();
}
$conn->close();
?>