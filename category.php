<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">

    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php include "config.php";

    $shop="SELECT * FROM shop";
    $query=mysqli_query($conn,$shop);
    $total_shops=mysqli_num_rows($query);

?>


    <section class="category-offers">
        <div class="d-flex justify-content-between mt-1">
            <div class="menu-dropdown">
                <ul>
                    <li class="category-list"><i class="fas fa-list"></i> Category<i class="fas fa-angle-down"></i>
                        <ul>
                            <?php    
                            
                                 if($total_shops){
                                    while($row = mysqli_fetch_assoc($query)){ 
                                            $products = "SELECT * FROM product WHERE shop={$row['shop_id']}";
                                            $product_query=mysqli_query($conn,$products);
                                            $total_products=mysqli_num_rows($query);
                                            ?>

                            <li><a class="text-capitalize"
                                    href="category_shop.php?sid=<?php echo $row['shop_id']?>"><?php echo $row['shope_name']?><i
                                        class="fas fa-angle-right"></i></a>

                                <ul>
                                    <?php   
                                                if($total_products){
                                                    while($product_row = mysqli_fetch_assoc($product_query)){ ?>
                                    <li><a class="text-capitalize"
                                            href="category_search.php?product_id=<?php echo $product_row['Product_ID'] ?>"><?php echo $product_row['Product_name']?></a>
                                    </li>
                                    <?php }
                                                    }?>
                                </ul>
                            </li>
                            <?php 
                                    }
                                 }
                            
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="top-offers">
                <ul>
                    <li><a href=""><i class="fas fa-gift"></i>
                            Top Offers</a></li>
                </ul>
            </div>

        </div>

    </section>

</body>

</html>