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
         width:500px;
         height: 500px;
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
.email{
    margin-bottom: 30px;
    border-radius: 25px;
    box-shadow: inset 8px 8px 8px #cdced1,inset -8px -8px 8px #fff;
}
.reset-btn{
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
.reset-btn:hover{
    background-color: #e98234;
}
.fields i{
    height: 22px;
    margin: 0 10px -3px 25px;
}
.error{
    height:30px;
    width:100%;
    background-color:rgb(248, 137, 137);
    border-radius: 5px;
    color: black;
    padding-left: 5px;
    text-align:center;
}
.sucess{
    height:30px;
    width:100%;
    background-color:rgb(13, 245, 21);
    border-radius: 5px;
    color: black;
    padding-left: 5px;
    text-align:center;
}
     </style>
    </head>
    <body>
<form action="reset.php" method="POST">
    <div class="container">
    <div class="logo"></div>
        <div class="title">ENTER YOUR MAIL:</div>
        <?php if(isset($_GET['error'])){?>
         <p class="error"><?php echo $_GET['error'];?></p>
         <?php } ?>
    <?php if(isset($_GET['sucess'])){?>
         <p class="sucess"><?php echo $_GET['sucess'];?></p>
         <?php } ?>
         <div class="fields">
         <div class="email">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" class="input-email" placeholder="enter email" required>
        </div>
        </div>
        <input type="submit" value="reset" name="reset" class="reset-btn">

</div>
</form>
</body>
</html>