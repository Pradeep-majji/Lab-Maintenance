


<html>
    <head>
        <link href="labsignup1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
        <script>
	function validate(){
		var name=/^[a-zA-Z]+[." "]*[a-zA-Z" ".]*$/;
    	var email=/^[a-zA-Z]+\w+@gmail.com$/;
		var password=/^[a-zA-Z]+[@&£#$¥€]{1}[0-9]+$/;
  		var password2=/^[a-zA-Z]+[@&£#$¥€]{1}[0-9]+$/;
        var p1=document.getElementById("password").value;
        var p2=document.getElementById("password2").value; 
		var ru1=name.test(document.getElementById("name").value);
  		var re1=email.test(document.getElementById("email").value);
  		var rpa1=password.test(document.getElementById("password").value);
  		var rpa2=password2.test(document.getElementById("password2").value);
		if(p1==p2)
		{
			if(ru1==true)
			{
				if(re1==true)
				{
					if(rpa1==true)
					{
						alert("valid inputs");
					}
					else
					{
						alert("invalid password");
						return false;
					}
				}
				else{
					alert("invalid email");
					return false;
				}
			}
			else{
				alert("name invalid");
				return false;
			}
		}
		else{
			alert("passwords not match");
			return false;
		}
	
	}
</script>
    </head>
    <body>
    <form onsubmit="return validate()" action="sendotp.php" method="POST">
        <div class="signup-div">
        <div class="logo"></div>
        <div class="title">SRKR LAB DIRECTORY</div>
        <div class="sub-title">Sign-Up</Sign-Up></div>
        <?php if(isset($_GET['error'])){?>
         <p class="error"><?php echo $_GET['error'];?></p>
         <?php } ?>
    <?php if(isset($_GET['sucess'])){?>
         <p class="sucess"><?php echo $_GET['sucess'];?></p>
         <?php } ?>
        <div class="fields">
        <div class="name">
            <i class="fa-solid fa-user"></i>
            <input type="text"id="name" name="name" class="input-input-name" placeholder="enter name" required>
        </div>
        <div class="email">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" id="email" name="email" class="input-email" placeholder="enter email" required>
        </div>
        <div class="password">
            <i class="fa-solid fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="enter password" required>
        </div>
        <div class="cirmpassword">
            <i class="fa-solid fa-lock"></i>
            <input type="password" id="password2" name="password2" placeholder="confirm password" required>
        </div>
        <button class="sign-btn" type="submit" name="submit" value="submit" id="submit">Sign-Up</button>
        </div>
        </div>
      </form>
    </body>
</html>