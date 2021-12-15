<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">

    <link rel="stylesheet" href="style/style.css">

    <title>Delivery Details | LocalMarket</title>

    <style>
    .bg-check {
        background: #fff;
        border-radius: 8px;
    }

    .checkout h4 {
        display: inline-block;
        border-bottom: 1px solid black;
    }
    </style>
</head>

<body>
    <?php include "navbar2.php" ?>
    <div class="checkout mt-2">
        <div class="container">
            <div class="row bg-check">
                <div class="col-md-11 col-12 mx-auto mt-md-3 mt-2">
                    <h4>Customer Details</h4>
                    <?php    
                                include "config.php";
                                session_start();
                                $name =$_SESSION['id'];
                                $sql ="SELECT * FROM signup WHERE customer_id='$name' ";
                                $query=mysqli_query($conn,$sql);
                                $email_pass=mysqli_fetch_assoc($query);
                                $phone = $email_pass['phone_no'];
                                $email = $email_pass['customer_email'];
                                $address = $email_pass['customer_address'];
                        ?>

                    <p class="mt-1">Address: <?php echo $address ?></p>
                    <div class="d-flex justify-content-between">
                        <p>Phone No: <?php echo $phone?></p> <a href="">Change</a>
                    </div>
                    <hr />
                </div>

                <div class="col-md-11 col-12 mx-auto mt-2">
                    <h4 class="mb-md-3 mb-2 mt-2">Collection Slot</h4>
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-5 mr-auto">

                                <select id="collectionDay" class="form-control custom-select-sm" name="select_box">
                                    <option selected value="">Collection Day</option>
                                    <?php
                                            date_default_timezone_set('Asia/Kathmandu');
                                              $date = date("l");
                                                          if ($date = 'Sunday' || $date = 'Monday' || $date = 'Tuesday'){
                                                             ?>

                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                </select>
                                <?php
                                                          } elseif($date = 'Wednesday'){
                                                            ?>

                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                </select>
                                <?php
                                                          } elseif($date = 'Thursday'){
                                                            ?>

                                <option value="Friday">Friday</option>
                                <option value="Wednesday">Wednesday</option>
                                </select>
                                <?php


                                                          } elseif($date = 'Friday' || $date = 'Saturday'){
                                                            ?>

                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                </select>
                                <?php
                                                          } ?>

                                </select>
                            </div>
                            <div class="col-12 col-md-5">
                                <select id="collectionTime" class="form-control custom-select-sm mt-2 mt-md-0"
                                    name="select_box">
                                    <option selected value="">Collection Time</option>
                                    <?php
                                           
                                              $time = date('h');
                                            
                                                          if ($time > 16 || $time < 10){
                                                             ?>

                                    <option value="10-13">10 AM - 1 PM</option>
                                    <option value="13-16">1 PM - 4 PM</option>
                                    <option value="16-19">4 PM - 7 PM</option>
                                </select>
                                <?php
                                                          }elseif($time < 13){
                                                            ?>

                                <option value="13-16">1 PM - 4 PM</option>
                                <option value="16-19">4 PM - 7 PM</option>
                                </select>
                                <?php
                                                          }elseif($time < 16){
                                                            ?>

                                <option value="16-19">4 PM - 7 PM</option>
                                </select>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-12 mx-auto">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm mt-md-3 mt-2 w-50 mb-3" type="button">PayPal
                            Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bg pt-2 mt-2">
        <div class="container">
            <?php include "footer.php" ?>
        </div>
    </div>
</body>

</html>