<?php

include '../config.php';


session_start();
if(!isset($_SESSION['trader_username'])){
    header("Location: login.php");
}



$id = $_POST['productID'];

$name = $_POST['itemName'];
$desc = $_POST['itemDesc'];
$price = $_POST['itemPrice'];
$stock = $_POST['stockLevel'];




$qry =
"UPDATE `product` SET `Product_name` = '$name', `Product_Description` = '$desc',`Product_price` = '$price',
`Product_quantity` = '$stock' WHERE `Product_ID` = '$id'";

$result = mysqli_query($conn, $qry) or die("Query Failed");

if ($result) {
echo "<script>alert('Your record has been updated')</script>";
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/">
<?php
}