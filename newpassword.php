<?php
$email=$_GET['email'];
$token=$_GET['token'];
?>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        *{
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
    background-color: #9cd7f5;
}
        .container{
            width:430px;
    height: 700px;
    padding: 60px 35px 35px 35px;
    border-radius: 40px;
    background-color: #ecf0f3;
    box-shadow:13px 13px 20px #b1def5,-13px -13px 20px #b1def5;

        }
        .logo {
        background:url(srkrpic.png) no-repeat;
        background-size: 100px 100px;
        width:100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto;
        box-shadow: 0px 0px 2px #5f5f5f,0px 0px 0px 5px #ecf0f3,8px 8px 15px #a7aaaf,-8px -8px 15px #fff;
    }
    .title{
        text-align: center;
        font-size: 28px;
        padding-top: 24px;
        letter-spacing: 0.5px;
    }
    .fields{
    width: 100%;
    padding: 40px 5px 5px 5px;
    background-color: #ecf0f3;
}
.fields input{
    border:none;
    outline: none;
    background: none;
    font-size:18px;
    color: #555;
    padding: 20px 10px 20px 5px;
}
.cimpassword,.password{
    margin-bottom: 30px;
    border-radius: 25px;
    box-shadow: inset 8px 8px 8px #cdced1,inset -8px -8px 8px #fff;
}
.fields i{
    height: 22px;
    margin: 0 10px -3px 25px;
}
i.fa-lock{
    margin-top: 10px;
    cursor: pointer;
}
.new-btn{
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
.new-btn:hover{
    background-color: #e98234;
}
.error{
    height:50px;
    width:100%;
    background-color:rgb(248, 137, 137);
    border-radius: 5px;
    color: black;
    padding-left: 5px;
}
        </style>
    <script src="newpassword.js"></script>
    </head>
    <body>
<form onsubmit="return validate()" action="update.php" method="POST">
    <div class="container">
    <div class="logo"></div>
        <div class="title">UPDATE YOUR PASSSWORD:</div>
        <?php if(isset($_GET['error'])){?>
         <p class="error"><?php echo $_GET['error'];?></p>
         <?php } ?>
         <div class="fields">
        <div class="password">
        <i class="fa fa-lock" onclick="show1()"></i>
        <input type="password" name="password" placeholder="enter your password" id="password" required></input>
        </div>
        <div class="cimpassword">
        <i class="fas fa-lock" onclick="show2()"></i>
        <input type="password" name="password2" placeholder="confirm password" id="password2" required></input>
        </div>
        </div>
        <input type="hidden" name="email" value="<?php echo $email;?>"></input>
        <input type="hidden" name="token" value="<?php echo $token;?>"></input>
        <input type="submit" value="submit" class="new-btn" name="submit">
</div>
</form>
<script>
            function show1(){
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
            function show2(){
                var pswrd = document.getElementById('password2');
                var icon = document.querySelector('.fas');
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