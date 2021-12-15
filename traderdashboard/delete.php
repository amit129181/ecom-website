<?php
include "../config.php";

$idk = $_GET['pid'];
$qry = "DELETE FROM product WHERE Product_ID = {$idk}";
$result = mysqli_query($conn, $qry) or die("Query not valid");

if ($result) {
    echo "<script>confirm('Are you want to delete this product')</script>";
    ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/index.php">
<?php
} else {
    echo "<script>alert('Record not inserted')</script>";
    ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/index.php">
<?php
}
?>