<?php
$to_mail="skrishna18@tbc.edu.np";
$subject="simple email test through php";
$body="Hi, this is test email send by php script";
$header="From: sahkrishna437@gmail.com";


if(mail($to_mail,$subject,$body,$header)){
    echo "email sent successfully to $to_mail";
}
else{
    echo "Email sending failed...";
}
?>