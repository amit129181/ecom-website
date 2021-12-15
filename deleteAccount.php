<?php 
        include "config.php";
        session_start();
        $name =$_SESSION['id'];
        $sql ="DELETE FROM signup WHERE customer_id='$name' ";
        $query=mysqli_query($conn,$sql) or die("Account deleting failed!!");
        session_unset();
        session_destroy();
        header("Location: index.php");
?>