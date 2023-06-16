<html>
    <head>  
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
    table{
        border-collapse:collapse;
        border :1px solid;
        width:100%;
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
    i{
        cursor: pointer;
    }
    </style>
    </head>
<body>
    <?php if(isset($_GET['error'])){?>
    <p class="error" style="color:black; padding-right:15%; font-size:30px;"><?php echo $_GET['error'];?></p>
    <?php } ?>
    <div class="main-div">
        <h1>List of members</h1>
        <div class="center-div">
            <div class="table">
                <table>

                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>TranscationId</th>
                            <th>Transcation Photo</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "connect.php";
                        $selectquery="select * from member where status=0";
                        $result=mysqli_query($conn,$selectquery);
                        while($res=mysqli_fetch_array($result))
                        {
                    ?>
                            <tr>
                            <td><?php echo $res['email'];?></td>
                            <td><?php echo $res['transid'];?></td>
                            <td><?php echo '<img src="data:image;base64,'.base64_encode($res['image']).'" alt="image" style="width:100px;height:100px;">';?></td>
                            <form action="accept.php" method="POST">
                            <td><button type="submit" name="submit" value="1">Accept</button></td>
                            <td><button type="submit" name="submit" value="0">Reject</button></td>
                            <input type="hidden" name="email" value="<?php echo $res['email'];?>">
                            </form>
                            </tr>
                    <?php
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>


