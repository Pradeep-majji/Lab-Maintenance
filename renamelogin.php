<html>
   <head>
      <meta>
      <title>Login Form</title>
      <link rel="stylesheet" href="login.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   </head>
   <body>
      <div class="center">
         <div class="header">
            Login Form
         </div>
         <?php if(isset($_GET['error'])){?>
         <p class="error" style="color:aqua; padding-right:15%; font-size:30px;"><?php echo $_GET['error'];?></p>
         <?php } ?>
         <form action="validate.php" method="POST">
            <input type="text" placeholder="Email or Username" name="email" required>
            <i class="far fa-envelope"></i>
            <input id="pswrd" type="password" placeholder="Password" name="password" required>
            <i class="fas fa-lock" onclick="show()"></i>
            <input type="submit" value="Sign in">
            <a href="forgetpassword.php">Forgot Password?</a>
         </form>
      </div>
      <script>
         function show(){
          var pswrd = document.getElementById('pswrd');
          var icon = document.querySelector('.fas');
          if (pswrd.type === "password") {
           pswrd.type = "text";
           pswrd.style.marginTop = "20px";
           icon.style.color = "aqua";
          }else{
           pswrd.type = "password";
           icon.style.color = "grey";
          }
         }
      </script>
   </body>
</html>
