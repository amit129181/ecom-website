<?php

include "config.php";

                $limit_per_page = 8;
                $page ="";
                if(isset($_POST["page_no"])){
                    $page =$_POST["page_no"];
                }else{
                    $page = 1;
                }

                $offset =($page -1) * $limit_per_page;

            $sql = "SELECT * FROM product LIMIT ". $offset.",".$limit_per_page."";
 
            $result = mysqli_query($conn,$sql);

            

 ?>


<div class="container">

    <div class="row justify-content-center justify-content-md-start">

        <?php

                        if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_assoc($result)){ 
                                $pid= $row['Product_ID'];
                                $sql_discount = "SELECT offer_amount FROM product_offer WHERE product_id =$pid ";
                                $discount_result = mysqli_query($conn,$sql_discount);
                                $product_offer_amount = mysqli_fetch_assoc($discount_result);
                                ?>
        <div class="col-md-4 col-lg-3 col-sm-6 col-11 my-2">

            <div class="card shadow">
                <img class="card-img-top img-fluid border-bottom" src="images/<?php echo $row['Product_image']; ?>"
                    alt="">
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

<!--Pagination  -->
<div class="next-prev-pagination pagination mb-3" id="pagination">

    <?php 
        $sql_total_items= "SELECT * FROM product";

        $records = mysqli_query($conn,$sql_total_items);

        $total_records = mysqli_num_rows($records);

        $total_pages = ceil($total_records/$limit_per_page);

      
        for($i=1;$i<=$total_pages;$i++){

            if($i == $page){
               echo "<a class='active mr-1' href='' id='{$i}'>{$i}</a>";
              }else{
               echo "<a class='mr-1' href='' id='{$i}'>{$i}</a>";
              }
          
        }
        ?>
</div>
<!-- Pagination Ends -->

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