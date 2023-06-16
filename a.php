<?php
include "connect.php";
$sql="select * from images";
$result=mysqli_query($conn,$sql);
?>
<html>
    <head>
        <style>

        </style>
    </head>
    <body>
        <div class="myimages">
            <?php
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result))
                {
                    $eventname=$row['id'];
                    echo '<form action="description.php" method="POST">
                    <input type="hidden" name="1" value='.$eventname.'>
                    <button type="submit" name="submit" value="submit"><img src="data:image;base64,'.base64_encode($row['pic']).'" alt="image" style="width:100px;height:100px;"></button> 
                    </form>';
                }
                }
            else{
                echo '<span>No Events</span>';
            }
            ?>
        </div>
        <form action="b.php" method="POST">
        <div class="btn">
            <input type="submit" name="submit" value="Click-Me">    
        </div>
        </form>
    </body>
</html>