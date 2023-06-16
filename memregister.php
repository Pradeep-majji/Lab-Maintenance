<html>
    <head>
    </head>
    <body>
        <?php if(isset($_GET['error'])){?>
        <p class="error" style="color:black; padding-right:15%; font-size:30px;"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="email" name="email" placeholder="enter your email"><br>
            <input type="file" name="image" id="image"><br>
            <input type="text" name="tid" placeholder="enter transcation id"><br>
            <input type="submit" name="submit" value="submit" value="submit">
        </form>
    </body>
</html>