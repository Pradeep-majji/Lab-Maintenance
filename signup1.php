<!DOCTYPE html>
<html lang="en">
<head>
<style>
body{
	background: linear-gradient(to right,#0f2027,#203a43,#2c5346);
	font-family: 'Poppins',sans-serif;
}

form{
	width:500px;
	margin:20vh auto 0 auto;
	padding:40px;
	background-color:#00FFFF;
	border-radius:4px;
	font-size:12px;
	
}

 h1{
	color:#0f2027;
	text-align:center;
}

 button{
	padding:10px;
	margin-left:12px;
	margin-top:20px;
	width:100%;
	height:50px;
	color:white;
	background-color:black;
	border:none;
	border-radius:4px;
    cursor: pointer;
}
button:hover{
	opacity: 80%;
}
.input-control{
	display:flex;
	flex-direction:column;
}

.input-control input{
	margin-top:15px;
	border:2px solid #f0f0f0;
	border-radius:4px;
	font-size:12px;
	padding:10px;
	width:100%;
}

.input-control input:focus{
	outline:0;
}

.input-control.success input{
	border-color:#09c372;
}

.input-control.error input{
	border-color:#ff3860;
}
</style>
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
<div class="container">
<form onsubmit="return validate()" action="sendotp.php" method="POST">
<h1>Registration/SignUp Form</h1>
<?php if(isset($_GET['error'])){?>
    <p class="error" style="color:black; padding-right:15%; font-size:30px;"><?php echo $_GET['error'];?></p>
    <?php } ?>
<div class="input-control">
	<input id="name" name="name" type="text" placeholder="name" required>
	<div class="error"></div>
</div>
<div class="input-control">
	<input id="email" name="email" type="email" placeholder="email" required>
	<div class="error"></div>
</div>
<div class="input-control">
	<input id="password" name="password" type="password" placeholder="password" required>
	<div class="error"></div>
</div>
<div class="input-control">
	<input id="password2" name="password2" type="password" placeholder="confirm password" required>
	<div class="error"></div>
</div>
	<button type="submit" name="submit" value="submit" id="submit" >Sign Up</button>
	</form>
		</div>
</body>
</html>