<?php
include "connect.php";
?>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>JavaScript Loops</title>
        <meta name="description" content="Learn JavaScript Loops!">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="admincolor.css">
    </head>
    <body>
<?php
$sql="select color from pccolors";
$result=mysqli_query($conn,$sql);
$datas=array();
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $datas[]=$row;
    }
}
/*
foreach($datas as $data){
    echo $data['color'];
} */ 
$wsql="select count(*) as color from pccolors where color='green'";
$ntsql="select count(*) as color from pccolors where color='red'";
$result1=mysqli_query($conn,$wsql);
$result2=mysqli_query($conn,$ntsql);
$res1=mysqli_fetch_assoc($result1)['color'];
$res2=mysqli_fetch_assoc($result2)['color'];   
if(isset($_POST['1']))
$lab=$_POST['1'];
else
$lab=$_GET['lab'];
?>
<div class="header"><div class="name">LAB STATUS - <?php echo $lab?><br><div class="count">WORKING:<?php echo $res1?>      NOT-WORKING:<?php echo $res2?></div></div>
<button name="HOME" value="HOME" style="background:#1a8ac3; height:40px;width:200px;font-size:20px; color:white; cursor:pointer; border-radius:5px; margin-left:100px; margin-top:40px;" onclick="window.location.href='adminbutton.php'">HOME</button>
</div><form action="adminpcstatus.php" method="POST">
<?php if(isset($_GET['error'])){?>
    <p class="error" style="color:black; margin-left:580px; margin-top:20px; font-size:30px;"><?php echo $_GET['error'];?></p>
    <?php } ?>
<main></main>
<input type="hidden" name="lab" value="<?php echo $lab;?>"></input>
</form>
<script>
    const main = document.querySelector('main');


let htmlString = "";
var a=<?=json_encode($datas)?>;
var k=0;
for ( let i = 0; i < 8; i += 1) {
  for(let j=1;j<=10;j++){
    if(a[k]["color"]=="green")
    {
        
    htmlString+=`<button style="border:none; background:none;" type="submit" name="pcno" value="${i*10+j}"><div class="container"><img src="greencomp.png" alt="Snow" style="width:100%; border:none;"><div class="centered">${i*10+j}</div></div></button>`;
    }
    else
    {
    htmlString+=`<button style="border:none; background:none;" type="submit" name="pcno" value="${i*10+j}"><div class="container"><img src="redcomp.png" alt="Snow" style="width:100%; border:none;"><div class="centered">${i*10+j}</div></div></button>`;
    }
    //htmlString += `<button style="background:black;border:none;" type="submit" name="pcno" value="${i*10+j}"><div style="color:black; background-color:${a[k]["color"]}">${i*10+j}</div></button>`;
    if (j==4)
     htmlString+=`<spacebox style="visibility:hidden;">ROW____${i}</spacebox>`;
    k+=1;
  }
  htmlString+=`<br>`;
}
main.innerHTML = htmlString;
</script>
</body>
</html>
<?php
$conn->close();
?>
