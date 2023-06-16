<?php
include "connect.php";
if(isset($_POST['submit']))
{
    $id=$_POST['1'];
    $sql="select * from images where id='$id'";
    $result=mysqli_query($conn,$sql);
while($res=mysqli_fetch_array($result))
{
    echo '<img src="data:image;base64,'.base64_encode($res['pic']).'" alt="image" style="width:100px;height:100px;">';
    echo $res['id'];  
}
}
?>