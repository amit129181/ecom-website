<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LocalMarket">
    <meta name="description" content="LocalMarket.com">
    <meta name="description" content="This is a LocalMarket website that sell goods">
    <meta name="keywords" content="butcher,fishmonger,greengroceries,bakery,delicatesen">
    <meta name="keywords" content="cake,fish,meat,vegetables,cookie">
    <meta name="author" content="Nascent Developers">
    <META NAME="geo.placename" CONTENT="Cleckhudderfax, UK">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">
    <link rel="stylesheet" href="style/style.css">
    <title>LocalMarket | Welcome</title>
</head>

<style>

</style>

<body>

    <div id="navbar">
        <?php include "navbar.php" ;
 include "config.php";
?></div>
    <div class="container">
        <?php include "category.php" ?>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/banner3.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/banner.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <div class="item-header my-md-3 mt-2 bg-white">
        <div class="container d-sm-flex">
            <h4 class="py-2 text-center">Recently Added</h4>
        </div>
    </div>


    <main class="all-items">
        <div class="container">

            <div class="row justify-content-center justify-content-md-start">
                <?php
			            $sql = "SELECT * FROM product order by Product_ID desc limit 4";
			            $result = mysqli_query($conn,$sql);

			            if(mysqli_num_rows($result) > 0){

				            while($row = mysqli_fetch_assoc($result)){

                                $pid= $row['Product_ID'];
                                $sql_discount = "SELECT offer_amount FROM product_offer WHERE product_id =$pid ";
                                $discount_result = mysqli_query($conn,$sql_discount);
                                $product_offer_amount = mysqli_fetch_assoc($discount_result);
                                ?>
                <div class="col-md-4 col-lg-3 col-sm-6 col-11 my-2">

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


    <div class="item-header my-md-3 mt-2 bg-white">
        <div class="container ">
            <div class="py-2 d-sm-flex justify-content-between my-auto">
                <h4 class="my-auto text-center">Just For You</h4>
                <div class="nav-item dropdown sort-product" id="">
                    <form action="sorting.php" method="GET">
                        <div class="input-group">
                            <select class="sort-select form-control custom-select-sm mt-sm-1 mt-2" name="sort"
                                id="inputGroupSelect04">
                                <option value="0">
                                    Sort: Default</option>
                                <option value="1">
                                    Sort: Rating High to Low</option>
                                <option value="2">
                                    Sort: Rating Low to High</option>
                                <option value="3">
                                    Sort: Price High to Low</option>
                                <option value="4">
                                    Sort: Price Low to High</option>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-dark btn-sm btn-height"
                                    name="submit-sort">Go</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <main class="all-items add-pages" id="add-pages">
        <!-- Pagination -->
    </main>



    <div class="footer-bg pt-2">
        <div class="container">
            <?php include "footer.php" ?>
        </div>
    </div>

    <?php include "script.php" ?>

    <script src="http://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        function loadTable(page) {
            $.ajax({
                url: "pagination.php",
                type: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    $("#add-pages").html(data);
                }
            });
        }
        loadTable();

        //Pagination Code
        $(document).on("click", "#pagination a", function(e) {
            e.preventDefault();
            var page_id = $(this).attr("id");
            loadTable(page_id);
        })
    });

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