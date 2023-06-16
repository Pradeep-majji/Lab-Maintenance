<?php
include "connect.php";
//$lab=$_POST['lab'];
$id=$_POST['pcno'];
$lab=$_POST['lab'];
$selectquery="select cpu,keyboard,monitor,mouse,color from pccolors where id='$id' and lab='$lab'";
$result=mysqli_query($conn,$selectquery);
$datas=array();
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $datas[]=$row;
    }
}
$newdatas=array();
foreach($datas as $data)
{
    array_push($newdatas,$data['cpu']);
    array_push($newdatas,$data['keyboard']);
    array_push($newdatas,$data['monitor']);
    array_push($newdatas,$data['mouse']);
    array_push($newdatas,$data['color']);
    
}
?>



<html>
    <head>
        <style>
            body{
    display:flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #23242a;
    }
            table{
                border-collapse:collapse;
                border :1px solid;
                width:100%;
                height:80%;
                font-size:20px;
            }
            th,td{
                border:1px solid;
                text-align:left;
                padding :8px;
                background-color:white;
            }
            th{
              border:1px solid;
              background-color:#04AA6D;  
            }
            td.heads{
                background-color:aqua;
            }
            .container{
    position: relative;
    width: 380px;
    height: 420px;
    background: #1c1c1c;
    border-radius: 8px;
    color:aqua;
    font-size:25px;
    overflow: hidden;}
    .container button
{
    border: none;
    outline: none;
    background: #45f3ff;
    padding: 11px 25px;
    border-radius: 4px;
    margin-top:10px;
    font-weight: 600;
    cursor: pointer;
}
        </style>
</head>
<body>
    <div class="container">
        <center>
          LAB-<?php echo $lab;?>:<?php echo $id;?>
     </center>
<table>
<tbody>
<tr>
 <td class="heads"> CPU </td>
 <td><?php echo $newdatas[0];?></td>
</tr>
<tr>
 <td  class="heads"> KEYBOARD </td>
 <td><?php echo $newdatas[1];?></td>
</tr>
<tr>
 <td  class="heads"> MONITOR </td>
 <td><?php echo $newdatas[2];?></td>
</tr>
<tr>
 <td  class="heads"> MOUSE </td>
 <td><?php echo $newdatas[3];?></td>
</tr>
<tr>
 <td  class="heads"> STATUS </td>
 <td><?php echo $newdatas[4];?></td>
</tr>
</tbody>
</table>
<form action="edit1.php" method="POST">
<input type="hidden" name="lab" value="<?php echo $lab;?>"></input>
<input type="hidden" name="id" value="<?php echo $id;?>"></input>
<center><button>EDIT</button></center>
</form>
</div>
</body>
<!--<button onclick="window.location.href='edit1.php'">EDIT</button>-->
    </html>
<?php
$conn->close();
?>


