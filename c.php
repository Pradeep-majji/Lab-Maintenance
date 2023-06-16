<?php
session_start();
include "connect.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_otp($email,$conn,$eventname){
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pradeepmajji42@gmail.com';                     //SMTP username
    $mail->Password   = 'jkefoxawofbmuwkl';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pradeepmajji42@gmail.com', $email);
    $mail->addAddress($email);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'EVENT STATUS';
    $email_template="
    <h2>Hello</h2>
    <h3>$eventname is added pls go through the Ace website for more details</h3>
    ";
    $mail->Body  = $email_template;

    if($mail->send())
    {
        return true;
    }
    else{
        return false;
    }
}
if(isset($_POST['add']))
{
    $flag=1;
    $name=$_POST['name'];
    $size=$_FILES['image']['size'];
    if($name!="" && $size>0){
    $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $id=$_POST['name'];
    $record="select * from images where id='$id'";
    $recordres=mysqli_query($conn,$record);
    if(mysqli_num_rows($recordres)==0){
    $sql="insert into images(id,pic) values('$id','$file')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script type="text/javascript">alert("Event Added Sucessfully")</script>';
        $emailsql="select * from member where status=1";
        $emailresult=mysqli_query($conn,$emailsql);
        if($emailresult)
        {
            while($res=mysqli_fetch_array($emailresult))
            {
                if(!send_otp($res['email'],$conn,$name))
                {
                    $flag=0;
                    break;
                }
            }
            if($flag==0)
            {
                header("Location:b.php?error=try again, something went wrong in sending mails");
                exit(); 
            }
            header("Location:b.php?error=Event Added sucessfully and mails send sucessfully.");
            exit(); 
        }
        else{
            header("Location:b.php?error=try again, something went wrong");
            exit();
        }
    }
    else{
        header("Location:b.php?error=try again, something went wrong");
        exit();
    }
    }
    else
    {
        header("Location:b.php?error=Event already entered.");
        exit();  
    }
    }
    else
    {
        header("Location:b.php?error=insert fields properly");
        exit();  
    }
}
elseif(isset($_POST['delete'])){
?>
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
        .hello{
            height:500px;
            width:500px;
            margin:auto;
            background-color:skyblue;
        }
        </style>
    </head>
    <form action="d.php" method="POST">
        <div class="hello">
        <input type="text" name="name" id="name" placeholder="enter event ID/Name" required>
        <input type="submit" name="submit" value="submit">
        </div>
    </form>
</html>
<?php
}
else{
    header("Location:b.php?error=try again, something went wrong or pls insert image");
    exit(); 
}
$conn->close();
?>