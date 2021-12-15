<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">
    <link rel="stylesheet" href="style/style.css">
    <title>
        Cart
    </title>
</head>

<body>
    <div id="navbar">
        <?php include "navbar.php" ;
 include "config.php";
?></div>
    <div class="container">
        <?php include "category.php" ?>
    </div>
    <section class="my-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 mx-auto col-12 main_cart mb-lg-0">
                    <div class="card">
                        <h2 class="pt-4 mx-auto font-weight-bold pb-1 border-bottom">
                            <i class="fas fa-shopping-basket"></i>
                            My Cart
                        </h2>
                        <hr />
                        <?php
                     if(isset($_COOKIE['user_cart'])){
                         $pid = json_decode($_COOKIE['user_cart']);
                         if(is_object($pid)){
                            $pid = get_object_vars($pid);
                                  }
                            $pids = implode(',',$pid);

                               $sql = "select * from product where Product_ID in ($pids)";
                                $result = mysqli_query($conn, $sql) or die("query didnt worked");
                                $no_of_rows=mysqli_num_rows($result);
                                $total_unit_price = 0;
                                if(mysqli_num_rows($result) > 0){ 
                                $row = mysqli_fetch_assoc($result); 
                                foreach($result as $row){
                                  ?>
                        <div class="cart-border row mt-4">
                            <!-- cart images div -->
                            <div class="col-md-2 d-flex product_img">
                                <img alt="cart img" class="img-fluid cart-image"
                                    src="images/<?php echo $row['Product_image']; ?>">
                                </img>
                            </div>
                            <!-- cart product details -->
                            <div class="col-md-10 col-12 mt-2 ">
                                <div class="row justify-content-md-center">
                                    <!-- product name  -->
                                    <div class="col-md-10 col-9 card-title">
                                        <h1 class="product_name">
                                            <?php echo $row['Product_name']; ?>
                                        </h1>
                                    </div>
                                    <!-- quantity -->
                                    <div class="col-md-2 col-3 card-title">
                                        <input class="form-control form-control-sm item-qty" type="number" value="1"
                                            min='1' max='20' />
                                    </div>
                                </div>
                                <!-- //remover move and price -->
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-between remove">
                                        <a class="text-danger" href="" data-id="<?php echo $row['Product_ID']; ?>">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                            REMOVE ITEM
                                        </a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end unit">
                                        <p>
                                            UNIT PRICE: £<span
                                                class="cart-price"><?php echo $row['Product_price']; ?></span>
                                            <?php $total_unit_price = $total_unit_price + $row['Product_price']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <?php }
                        
                            }?>

                        <div class="row">
                            <div class="col-md-12 d-flex flex-column-reverse flex-sm-row justify-content-sm-between ">
                                <div class="coupon-code d-flex justify-content-sm-start justify-content-end">
                                    <div>
                                        <input class="form-control-sm" id="exampleFormControlInput1"
                                            placeholder="Enter Coupon Code" type="text">
                                        </input>
                                    </div>
                                    <div>
                                        <a class="btn btn-primary btn-sm ml-2 px-3" href="">
                                            Apply
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-sm-start justify-content-end mb-sm-0 mb-2">
                                    <h5>
                                        TOTAL PRICE: <?php echo "£"; ?>
                                    </h5>
                                    <h5 id="show-price">
                                        <?php
                                    if(isset($total_unit_price)){
                                        echo $total_unit_price;
                                    }
                                    else{

                                    }
                               ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-primary btn-sm">Continue Shopping</a>
                                <?php if(isset($_SESSION['username'])){ ?>
                                <a class="btn btn-primary btn-sm" href="after-checkout.php">Checkout</a>
                                <?php }?>
                                <?php if(!isset($_SESSION['username'])){ ?>
                                <a class="btn btn-primary btn-sm" href="#" data-toggle="modal"
                                    data-target="#userLogin_form">Checkout</a>
                                <?php }?>
                            </div>
                        </div>

                        <?php } else { ?>
                        <div class="empty-result text-center">
                            Your cart is currently empty. <a href="index.php">Continue Shopping</a>
                        </div>
                        <?php }
                ?>
                    </div>
                </div>
            </div>
    </section>


    <div class="footer-bg pt-2 mt-3">
        <div class="container">
            <?php include "footer.php" ?>
        </div>
    </div>
    <?php include "script.php" ?>

    <script src="script/action.js"></script>

    <script src="http://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $('.text-danger').click(function(e) {
            e.preventDefault();
            var p_id = $(this).attr('data-id');
            $.ajax({
                url: 'actions.php',
                method: 'POST',
                data: {
                    removeCartItem: p_id
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.item-qty').change(function() {

            var cartRows = document.getElementsByClassName("cart-border");

            total = 0
            total_quantity = 0
            for (var i = 0; i < cartRows.length; i++) {
                var cartRow = cartRows[i]
                var priceElement = cartRow.getElementsByClassName('cart-price')[0]
                var quantityElement = cartRow.getElementsByClassName('item-qty')[0]
                var price = parseFloat(priceElement.innerText.replace('$', ''))
                var quantity = quantityElement.value
                total = total + (price * quantity)
                var total_quantity = total_quantity + parseInt(quantity)
            }

            if (total_quantity > 20) {
                alert("You cannot purcahse more than 20 item");
            } else {
                document.getElementById("show-price").innerHTML = total;
            }

        });
    });
    </script>
</body>

</html>