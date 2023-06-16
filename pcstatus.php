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
             *{
    padding:0;
    margin:0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
}
    .maincon{
        display:flex;
        flex-direction:row;
        margin-top:20px;
    }
            table{
                border-collapse:collapse;
                border :2px solid black;
                width:100%;
                height:80%;
                font-size:20px;
            }
            th,td{
                border:2px solid black ;
                text-align:left;
                padding :8px;
                background-color:white;
                font-weight:bold;
            }
            th{
              border:1px solid black;
              background-color:#04AA6D;  
            }
            td.heads{
                background-color:#1a8ac3; 
                color:white; 
            }
   .maincon .container{
   /* width: 380px;
    height: 420px;
    background: #1c1c1c;
    display:inline-block;
    border-radius: 8px;
    color:aqua;
    font-size:25px;
    overflow: hidden;
    /*margin:auto;*/
    margin-top:20px;
    overflow:hidden;


    width:400px;
    height: 420px;
    padding: 60px 35px 35px 35px;
    border-radius: 40px;
    background-color: #ecf0f3;
    box-shadow:13px 13px 20px #cdced1,-13px -13px 20px #fff;
    margin-left:150px;
}
    .container button
{
    border: none;
    outline: none;
    background: #1a8ac3;
    color:white;
    padding: 11px 25px;
    border-radius: 4px;
    margin-top:10px;
    font-weight: 600;
    cursor: pointer;
}

label{
    color: black;
    display: inline-block;
    width: 40px;
    text-align: left;
    font-size: 0.9em;
    font-weight:bold;

}
.login-div span
{   
    margin-left:10px;
    position: absolute;
    font-size: 0.9em;
    color: black;
    letter-spacing: 0.1em;
    font-weight:bold;
}
.login-div button
{
    border: none;
    outline: none;
    background: #1a8ac3;
    color:white;
    padding: 11px 30px;
    border-radius: 4px;
    margin-top:40px;
    font-weight: 600;
    cursor: pointer;
    width: 80%;
    height:40px;
    display:inline-block;
    margin-left:40px;
}

input[type="radio"]{
    margin-left:140px;
    cursor:pointer;
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
  margin-left: 580px;
  color:white;
  font-weight: bolder;
 }






 /**{
    box-sizing: border-box;
}
body{
    margin: 0;
    height: 100vh;
    width: 100vw;
    overflow: hidden;
    font-family: "Lato", sans-serif;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #555;
    background-color: #ecf0f3;
}*/
.login-div{
    width:400px;
    height: 420px;
    padding: 60px 35px 35px 35px;
    border-radius: 40px;
    background-color: #ecf0f3;
    box-shadow:13px 13px 20px #cdced1,-13px -13px 20px #fff;
    margin-left:50px;
    margin-top:27px;
}


.fields{
    width: 100%;
    padding: 75px 5px 5px 5px;
}
.fields input{
    border:none;
    outline: none;
    background: none;
    font-size:18px;
    color: #555;
    padding: 20px 10px 20px 5px;
}
.email,.password{
    margin-bottom: 30px;
    border-radius: 25px;
    box-shadow: inset 8px 8px 8px #cdced1,inset -8px -8px 8px #fff;
}
.fields i{
    height: 22px;
    margin: 0 10px -3px 25px;
}
.login-btn{
    outline: none;
    border: none;
    cursor: pointer;
    width:100%;
    height: 60px;
    border-radius: 30px;
    font-size: 20px;
    font-weight: 700;
    font-family: "Lato",sans-serif;
    color: #fff;
    text-align: center;
    background-color: #02c8db;
    box-shadow: 3px 3px 8px #b1b1b1,-3px -3px 8px #fff;
    transition: all 0.5s;
}
.login-btn:hover{
    background-color: #50e5b9;
}
.login-btn:active{
    background-color: #88ef9e;
}
.link{
    padding-top: 20px;
    text-align: center;
}
.link a{
    text-decoration: none;
    color: #aaa;
    font-size: 15px;
}
        </style>
</head>
<body>
<div class="header"><div class="name">LAB-<?php echo $lab;?>:<?php echo $id;?></div></div>
    <div class="maincon">
    <?php
    if($newdatas[4]=="green"){
        echo '<img src="greencomp.png" alt="srkr" style="height:350px;width:300px; margin-left:80px; margin-top:50px;">';

    } 
    else{
        echo '<img src="redcomp.png" alt="srkr" style="height:350px;width:300px; margin-left:80px; margin-top:50px;">';
    }
    ?>
    <div class="container">
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
<center><button onclick="myfun()">EDIT</button></center>
</div>
<main></main>
</div>
<script>
    function myfun(){
        const main = document.querySelector('main');

        let frame=`<div class="login-div">
        <form action="edit.php" method="POST">
        <span>DESKTOP:</span>
            <input type="radio" value="no" name="desktop" style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3;" checked="checked"><label>NO</label>
             <input type="radio" value="yes" name="desktop" style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3; margin-left:20px;"><label>YES</label><br><br>
             <span>CPU:</span>
             <input type="radio" value="no" name="cpu" style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3;" checked="checked"><label>NO</label>
              <input type="radio" value="yes" name="cpu"  style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3; margin-left:20px;"><label>YES</label><br><br>
              <span>MOUSE:</span>
              <input type="radio" value="no" name="mouse"  style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3;" checked="checked"><label>NO</label>
               <input type="radio" value="yes" name="mouse"  style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3; margin-left:20px;"><label>YES</label><br><br>
               <span>KEYBOARD:</span>
               <input type="radio" value="no" name="keyboard"  style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3;" checked="checked"><label>NO</label>
                <input type="radio" value="yes" name="keyboard"  style="height:15px; width:15px; vertical-align: middle; accent-color:#1a8ac3; margin-left:20px;"><label>YES</label><br><br>
                <input type="hidden" name="lab" value="<?php echo $lab;?>"></input>
                <input type="hidden" name="id" value="<?php echo $id;?>"></input>
                <button type="submit">submit</button>
            </form>
        </div>`;
      /*  let frame=`
            <div class="box">
             <form action="edit.php" method="POST">
            <span>DESKTOP:</span>
            <input type="radio" value="no" name="desktop" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;" checked="checked"><label>NO</label>
             <input type="radio" value="yes" name="desktop" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua; margin-left:20px;"><label>YES</label><br><br>
             <span>CPU:</span>
             <input type="radio" value="no" name="cpu" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;" checked="checked"><label>NO</label>
              <input type="radio" value="yes" name="cpu"  style="height:15px; width:15px; vertical-align: middle; accent-color: aqua; margin-left:20px;"><label>YES</label><br><br>
              <span>MOUSE:</span>
              <input type="radio" value="no" name="mouse"  style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;" checked="checked"><label>NO</label>
               <input type="radio" value="yes" name="mouse"  style="height:15px; width:15px; vertical-align: middle; accent-color: aqua; margin-left:20px;"><label>YES</label><br><br>
               <span>KEYBOARD:</span>
               <input type="radio" value="no" name="keyboard"  style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;" checked="checked"><label>NO</label>
                <input type="radio" value="yes" name="keyboard"  style="height:15px; width:15px; vertical-align: middle; accent-color: aqua; margin-left:20px;"><label>YES</label><br><br>
                <input type="hidden" name="lab" value="<?php echo $lab;?>"></input>
                <input type="hidden" name="id" value="<?php echo $id;?>"></input>
                <button type="submit">submit</button>
            </form>
    </div>`*/
    
    
    main.innerHTML = frame;
    }

</script>
</body>
    </html>
<?php
$conn->close();
?>


