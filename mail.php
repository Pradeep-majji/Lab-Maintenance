<?php
$reciver="lakshmanavinay75@gmail.com";
$subject="Email test using via php";
$body="hi iam pradeep";
$sender="From:pradeepmajji42@gmail.com";
if(mail($reciver,$subject,$body,$sender))
{
    echo "email sent successfully";
}
else{
    echo "not send successfully";
}
?>