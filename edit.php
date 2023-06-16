<?php
include "connect.php";
$lab=$_POST['lab'];
$id=$_POST['id'];
$cpu=$_POST['cpu'];
$keyboard=$_POST['keyboard'];
$monitor=$_POST['desktop'];
$mouse=$_POST['mouse'];
if ($cpu=="yes"&&$keyboard=="yes"&&$monitor=="yes"&&$mouse=="yes"){
    $status="green";
}
else{
    $status="red";
}

echo $cpu;
$sql="update pccolors set cpu='$cpu',keyboard='$keyboard',monitor='$monitor',mouse='$mouse',color='$status' where lab='$lab' and id='$id'";
$result=$conn->query($sql);
if($result==TRUE)
{
   header("Location:colour.php?error=successfully updated&lab=$lab");
   exit();
}
else{
    echo "error".$sql."<br>".$conn->error;
}
$conn->close();
?>

