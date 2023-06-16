<?php
include "connect.php";
$id=$_POST['name'];
$sql="select count(*) as count from images where id='$id'";
$result=mysqli_query($conn,$sql);
if(mysqli_fetch_array($result)["count"]){
$msql="delete from images where id='$id'";
$run=mysqli_query($conn,$msql);
if($run){
    header("Location:b.php?error=Event Deleted Sucessfully.");
    exit();
}
else{
    header("Location:b.php?error=try again, something went wrong");
    exit();
}
}
else{
    header("Location:b.php?error=try again, something went wrong or event not found");
    exit();
}
$conn->close();
?>