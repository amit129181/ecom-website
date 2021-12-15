<?php

include "../config.php";

session_start();
if(!isset($_SESSION['trader_username'])){
    header("Location: login.php");
}




$id =$_SESSION['trader_id'];


$sql = "SELECT * from trader where trader_id='$id'";
$run_sql = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($run_sql) or die("Not Successful");

$sid = $row['shop'];




$name = $_POST['itemName'];
$price = $_POST['itemPrice'];
//$qty = $_POST['qtyItem'];
$stock = $_POST['stockLevel'];
$desc = $_POST['itemDesc'];
$rating = 0;
$rated=0;


// if(isset($_FILES['fileName'])){
//   $file_name = $_FILES['fileName']['name'];
//   $temp_name = $_FILES['fileName']['tmp_name'];
//   move_uploaded_file($file_name, "../images/".$file_name);

// $qry ="INSERT INTO `product` (`Product_name`, `Product_Description`, `Rating`, `Product_image`, `Product_price`, `Product_quantity`, `Rated_by`, `shop`, `trader_id`) VALUES ('$name', '$desc', '$rating', '$file_name', '$price', '$stock', '$rated', '$sid', '$id')";

// $result = mysqli_query($conn, $qry) or die("query unsucessful");

// }

$qry ="INSERT INTO `product` (`Product_name`, `Product_Description`, `Rating`, `Product_image`, `Product_price`, `Product_quantity`, `Rated_by`, `shop`, `trader_id`) VALUES ('$name', '$desc', '$rating', 'buffalo.jpg', '$price', '$stock', '$rated', '$sid', '$id')";

$result = mysqli_query($conn, $qry) or die("query unsucessful");

if ($result) {
echo "<script>
alert('Your Product has been inserted')
</script>";
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/index.php#viewItem">
<?php
        } else {
          echo "<script>alert('Your record has not been inserted')</script>";

          ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/index.php#viewItem">
<?php
            }
?>