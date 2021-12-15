<?php
session_start();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="shortcut icon" href="images/titlebar.png" type="image/png">
    <link rel="stylesheet" href="style/form.css" />
    <title>LocalMarket Sign-In</title>
</head>
<style>
form {
    height: 64.2vh;
    display: flex;
    align-items: center;
}
</style>

<body>

    <?php
include 'config.php';
if(isset($_POST['submit'])){
    $Email=$_POST['email'];
    $pass=$_POST['password'];

    $email_search="SELECT * FROM signup WHERE customer_email='$Email' and
    statuss='active'";
    $query=mysqli_query($conn,$email_search);
    $email_count=mysqli_num_rows($query);


    if($email_count){
        $email_pass=mysqli_fetch_assoc($query);
        $d_pass=$email_pass['passwords'];


        $_SESSION['username']=$email_pass['customer_name'];
        $_SESSION['id']=$email_pass['customer_id'];

        $pass_decode=password_verify($pass,$d_pass);
    
    if($pass_decode){
        echo "Login successfully";
        ?>
    <!--moving to the home page -->
    <script>
    location.replace("index.php");
    </script>

    <?php
    }
    else{
        echo "Password is Incorrect";
    }

}
else{
    echo "Invalid Email";
}

}
  ?>
    <?php include "navbar2.php"; ?>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-control">
            <h2 class="border-bottom text-center">Sign-In</h2>
            <div class="pt-2">
                <div class="inputWithIcon inputIconBg">
                    <input type="email" name="email" placeholder="Email" />
                    <i class="fa fa-envelope fa-lg fa-fw bg"></i>
                </div>
                <div class="inputWithIcon inputIconBg">
                    <input type="password" name="password" class="password" placeholder="Password" />
                    <i class="fas fa-key fa-lg fa-fw bg"></i>
                    <span class="eye">
                        <i class="fas fa-eye togglePassword"></i>
                    </span>
                </div>
                <input type="checkbox" id="rememberMe" name="rememberMe" value="rememberMe" />
                <label for="rememberMe"> Remember Me</label>
                <input class="btn" name="submit" type="submit" value="Continue" />

                <div class="text-center">
                    <p>
                        <small>Don't have an account?
                            <a href="register.php">Register</a></small>
                    </p>
                    <p>
                        <small><a href="">Forgot your password?</a></small>
                    </p>
                    <p>
                        <small><a href="traders-register.php">Login As Trader</a></small>
                    </p>
                </div>
            </div>
        </div>
    </form>
    <?php include "footer2.php" ?>

    <script src="script/script.js"></script>
</body>

</html>