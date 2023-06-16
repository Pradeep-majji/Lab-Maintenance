<?php
include "connect.php";
$sqlw="select count(*) as color from pccolors where color='green'";
$sqlnw="select count(*) as color from pccolors where color='red'";
$sqlcpu="select count(cpu) as cpu from pccolors where cpu='no'";
$sqlkeyboard="select count(keyboard) as keyboard from pccolors where keyboard='no'";
$sqlmonitor="select count(monitor) as monitor from pccolors where monitor='no'";
$sqlmouse="select count(mouse) as mouse from pccolors where mouse='no'";
$result1=mysqli_query($conn,$sqlw);
$result2=mysqli_query($conn,$sqlnw);
$result3=mysqli_query($conn,$sqlcpu);
$result4=mysqli_query($conn,$sqlkeyboard);
$result5=mysqli_query($conn,$sqlmonitor);
$result6=mysqli_query($conn,$sqlmouse);
$res1=mysqli_fetch_assoc($result1)['color'];
$res2=mysqli_fetch_assoc($result2)['color'];
$res3=mysqli_fetch_assoc($result3)['cpu'];
$res4=mysqli_fetch_assoc($result4)['keyboard'];
$res5=mysqli_fetch_assoc($result5)['monitor'];
$res6=mysqli_fetch_assoc($result6)['mouse'];
?>
<html>
<style>
 *{
    padding:0;
    margin:0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
}
.btn-group button {
  cursor: pointer;
  margin-top:20px;
  border-radius: 5px;
  border: 2px solid blue;
  overflow: hidden;
  margin-left:40px ;
}

.btn-group button:hover {
  opacity:80%;
}
.con1{
    width:850px;
    height: 420px;
    padding: 60px 35px 35px 35px;
    border-radius: 40px;
    background-color: #ecf0f3;
    box-shadow:13px 13px 20px #cdced1,-13px -13px 20px #fff;
    margin-left:40px;
    margin-top:60px;
}
table{
       border-collapse:collapse;
      border :2px solid black ;
      width:100%;
      height:96%;
      font-size:20px;
  }
  th,td{
      border:2px solid black;
      text-align:left;
      padding :8px;
      background-color:white;
  }
  th{
    border:1px solid black;
    background-color:#04AA6D;  
  }
  td.heads{
      background-color:#1a8ac3;
      color:white;
      font-weight:bolder;
  }

.container{
    display:flex;
    flex-direction:row;
 }
 .header{
  display:flex;
  flex-direction: row;
  width:100%;
  height:130px;
  background: #076593;
 }
 .name{
  justify-content: center;
  align-items: center;
  margin-top: 30px;
  letter-spacing: 2px;
  word-spacing: 10px;
  font-size: 50px;
  margin-left: 420px;
  color:white;
  font-weight: bolder;
 }
 .btn-group
 {
  margin-left:50px;
 }
 button .namecontainer {
    position: relative;
    text-align: center;
    color: black;
    height:250px;
    width:300px;
}

button .namecontainer .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    font-weight:bold;
    color:aqua;
    transform: translate(-75%, -75%);
    font-size: 30px;
  }
</style>
<body>
<div class="header"><div class="name">SRKR LAB DIRECTORY</div>
<button name="logout" value="logout" style="background:#1a8ac3; height:40px;width:200px;font-size:20px; color:white; cursor:pointer; border-radius:5px; margin-left:100px; margin-top:40px;" onclick="window.location.href='index.html'">logout</button>
</div>
<form action="admincolor.php" method="POST">
<div class="container">

<div class="con1">
<table>
<tbody>
<tr>
 <td class="heads"> TOTAL WORKING: </td>
 <td><?php echo $res1;?></td>
</tr>
<tr>
 <td class="heads"> NOT WORKING: </td>
 <td><?php echo $res2;?></td>
</tr>
<tr>
 <td class="heads"> CPU </td>
 <td><?php echo $res3;?></td>
</tr>
<tr>
 <td  class="heads"> KEYBOARD </td>
 <td><?php echo $res4;?></td>
</tr>
<tr>
 <td  class="heads"> MONITOR </td>
 <td><?php echo $res5;?></td>
</tr>
<tr>
 <td  class="heads"> MOUSE </td>
 <td><?php echo $res6;?></td>
</tr>
</tbody>
</table>
</div>

<div class="btn-group">
  <button type="submit" name="1" value="1"><div class="namecontainer"><img src="srkrlab1.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-1</div></div></button>
  <button type="submit" name="1" value="2"><div class="namecontainer"><img src="srkrlab2.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-2</div></div></button>
  <button type="submit" name="1" value="3"><div class="namecontainer"><img src="srkrlab1.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-3</div></div></button>
  <button type="submit" name="1" value="4"><div class="namecontainer"><img src="srkrlab2.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-4</div></div></button>
  <button type="submit" name="1" value="5"><div class="namecontainer"><img src="srkrlab1.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-5</div></div></button>
  <button type="submit" name="1" value="6"><div class="namecontainer"><img src="srkrlab2.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-6</div></div></button>
  <button type="submit" name="1" value="7"><div class="namecontainer"><img src="srkrlab1.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-7</div></div></button>
  <button type="submit" name="1" value="8"><div class="namecontainer"><img src="srkrlab2.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-8</div></div></button>
  <button type="submit" name="1" value="9"><div class="namecontainer"><img src="srkrlab1.jpg" alt="srkr" style="height:250px;width:300px;"><div class="centered">LAB-9</div></div></button>
  </div>

</div>
</form>
</body>
</html> 
<?php
$conn->close();
?>