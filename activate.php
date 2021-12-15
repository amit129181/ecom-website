<?php
session_start();
include 'config.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];

    $update_qry= "UPDATE signup SET status='active' WHERE
    token='$token'";

    $query=mysqli_query($con,$update_qry);

    if($quert){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg']="Account Activate successfully";
            header('location:login.php');
        }
        else{
            $_SESSION['msg']="you are logged out.";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['msg']="Account not Activated ";
            header('location:register.php');
    }
}

?>