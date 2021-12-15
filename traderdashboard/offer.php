<?php 

include "../config.php";

session_start();
if(!isset($_SESSION['trader_username'])){
    header("Location: login.php");
}

$id =$_SESSION['trader_id'];

if(isset($_POST['offerAmount'])){
    
        $product_id = $_POST['product_offer'];
   
        $offer = $_POST['offerAmount'];

        $product_select_offer = "SELECT offer_amount FROM product_offer WHERE product_id = '$product_id'";

        $result_product_offer = mysqli_query($conn,$product_select_offer) or die("Offer product Unsuccesful");

        while ($row = mysqli_fetch_assoc($result_product_offer)){

            $sql = "INSERT INTO `product_offer` (`offer_amount`, `product_id`, `trader_id`) VALUES ('$offer', '$product_id', '$id')";

            $result = mysqli_query($conn,$sql) or die("Offer Query Unsuccesful");
          
            // $update_offer = "UPDATE product_offer SET offer_amount = '$offer' WHERE product_id = '$product_offer_id'";
            // $result = mysqli_query($conn,$update_offer) or die("Offer Update query Unsuccesful");
        
    }
       

        if ($result) {
            echo "<script>alert('Offer has been Added')</script>";
            ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/">
<?php
        } else {
            echo "<script>alert('Record has not updated')</script>";
            ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/ecommfinal/traderdashboard/">
<?php
        }

    }
?>