<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">
    <link rel="stylesheet" href="style/form.css" />
    <title>LocalMarket Trader's Registeration</title>
</head>

<body>

    <?php include "navbar2.php"; ?>
    <form action="">
        <div class="form-control">
            <h2 class="border-bottom text-center">Create Trader's Account</h2>
            <div class="pt-2">
                <div class="inputWithIcon inputIconBg">
                    <input type="text" placeholder="Name" />
                    <i class="fa fa-user fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="text" placeholder="Shop Name" />
                    <class class="fas fa-store fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="email" placeholder="Email" />
                    <i class="fa fa-envelope fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="text" placeholder="Address" />
                    <i class="fas fa-map-marker-alt fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="text" placeholder="Phone Number" />
                    <i class="fa fa-phone fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="password" placeholder="Password" />
                    <i class="fas fa-lock fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="password" placeholder="Re-enter Password" />
                    <i class="fas fa-lock fa-lg fa-fw bg"></i>
                </div>

                <input class="btn text-white" type="button" value="Continue" />

                <div class="text-center">
                    <p>
                        <small>Already have an account? <a href="login.php">Signin</a></small>
                    </p>
                </div>
            </div>
        </div>
    </form>
    <?php include "footer2.php" ?>
</body>

</html>