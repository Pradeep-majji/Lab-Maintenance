<html>
    <head>
        <style>
        input[type="text"]{
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            margin-left:50px;
            margin-top:50px;
        }
        input[type="submit"]{
            background-color: #04AA6D;
           color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            margin-left:50px;
            margin-top:50px;
        }
            .upload{
                height:500px;
                width:500px;
                margin:auto;
                background-color:skyblue;
            }
        </style>
    </head>
    <body>
        <?php if(isset($_GET['error'])){?>
        <p class="error" style="color:black; padding-right:15%; font-size:30px;"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <form action="c.php" method="POST" enctype="multipart/form-data">
            <div class="upload">
            <input type="text" name="name" id="name" placeholder="enter event name/id">
            <input type="file" name="image" id="image"><br>
            <input type="submit" name="add" value="ADD EVENT"><br>
            <input type="submit" name="delete" value="DELETE EVENT">
            </div>
        </form>
    </body>
</html>