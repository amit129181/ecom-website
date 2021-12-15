<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">
    <title>Product | Category</title>
</head>

<body>

    <div id="navbar">
        <?php include "navbar.php" ;
 include "config.php";
?></div>
    <div class="container">
        <?php include "category.php" ?>
    </div>
    <main class="all-items">
        <div class="container">

            <div class="row justify-content-center justify-content-md-start">
                <?php
                        $product_id=$_GET['product_id'];
			            $sql = "SELECT * FROM product WHERE Product_ID = $product_id";
			            $result = mysqli_query($conn,$sql);

			            if(mysqli_num_rows($result) > 0){

				            while($row = mysqli_fetch_assoc($result)){ 
                                 
                                $pid= $row['Product_ID'];
                                $sql_discount = "SELECT offer_amount FROM product_offer WHERE product_id =$pid ";
                                $discount_result = mysqli_query($conn,$sql_discount);
                                $product_offer_amount = mysqli_fetch_assoc($discount_result);
                                ?>

                <div class="col-md-4 col-lg-3 col-sm-6 col-12 my-2">

                    <div class="card shadow">
                        <img class="card-img-top img-fluid border-bottom"
                            src="images/<?php echo $row['Product_image']; ?>" alt="">
                        <div class="card-body">
                            <h5 class="product-name card-title text-center"><?php echo $row['Product_name']; ?>
                            </h5>
                            <p class="text-center">
                                <?php echo '£'.  $row['Product_price']-$product_offer_amount['offer_amount']; ?>

                                <?php if($product_offer_amount['offer_amount'] == 0){?>
                                <?php echo '' ?>
                                <?php }else{?>
                                <small class="pl-3 text-muted">
                                    <?php echo '£'.$product_offer_amount['offer_amount'].' off' ?></small>
                                <?php }?>
                            </p>


                            <p class="mr-2 text-center"><?php echo $row['Rating']; ?>
                                <i class="fas fa-star fa-md text-warning"></i>
                            </p>
                            <a href="products.php?pid=<?php echo $row['Product_ID']; ?>"
                                class="btn btn-primary btn-sm w-100 mb-2">View Details</a>
                            <a href="" class="add-to-cart btn btn-warning w-100 btn-sm"
                                data-id="<?php echo $row['Product_ID']; ?>"><i class="fas fa-shopping-cart pr-2">
                                </i>Add To Cart</a>
                        </div>
                    </div>
                </div>
                <?php }
                     }?>
            </div>
        </div>
        </div>
    </main>

    <div class="footer-bg pt-2 mt-2">
        <div class="container">
            <?php include "footer.php" ?>
        </div>
    </div>

    <?php include "script.php" ?>
    <script src="http://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            var p_id = $(this).attr('data-id');
            $.ajax({
                url: 'actions.php',
                method: 'POST',
                data: {
                    addCart: p_id
                },
                success: function(data) {
                    $('#navbar').load('index.php #navbar', function() {
                        setTimeout(10);
                    });
                    setTimeout(8000);
                }
            });
        });
    });
    </script>
</body>

</html>