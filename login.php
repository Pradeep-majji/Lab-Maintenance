<html>
    <head>
        <link href="teacherlogin1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="login-div">
        <div class="logo"></div>
        <div class="title">SRKR LAB DIRECTORY</div>
        <div class="sub-title">Login</div>
        <?php if(isset($_GET['error'])){?>
         <p class="error"><?php echo $_GET['error'];?></p>
         <?php } ?>
         <?php if(isset($_GET['sucess'])){?>
         <p class="sucess"><?php echo $_GET['sucess'];?></p>
         <?php } ?>
         <form action="validate.php" method="POST">
        <div class="fields">
        <div class="email">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" class="input-email" placeholder="enter email" required>
        </div>
        <div class="password">
            <i class="fa fa-lock" onclick="show()"></i>
            <input type="password" name="password" placeholder="enter password" id="password" required>
        </div>
        </div>
        <input type="submit" value="Sign in" class="login-btn">
        <div class="link">
            <a href="forgetpassword.php">Forget password?</a>
        </div>
        </form>
        </div>
        <script>
            function show(){
                var pswrd = document.getElementById('password');
                var icon = document.querySelector('.fa');
                if (pswrd.type === "password") {
                 pswrd.type = "text";
                 icon.style.color = "#02c8db";
                }else{
                 pswrd.type = "password";
                 icon.style.color = "black";
                }
            }
        </script>
    </body>
</html>