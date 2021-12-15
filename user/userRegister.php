<?php

session_start();

include '../config.php';

if(isset($_POST['cusname'])){
    $username=mysqli_real_escape_string($conn,$_POST['cusname']);
    $email=mysqli_real_escape_string($conn,$_POST['cusmail']);
    $addr=mysqli_real_escape_string($conn,$_POST['cussaddress']);
    $mobile=mysqli_real_escape_string($conn,$_POST['cussmob']);
    $password=mysqli_real_escape_string($conn,$_POST['pass3']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['pass4']);
    $pattern = "/^(?=.*\d)(?=.*[0-9a-zA-Z]).*$/";

    if(!isset($_POST['cusname']) || empty($_POST['cusname'])|| empty($_POST['cusmail'])|| empty($_POST['cussaddress']) || empty($_POST['cussmob']) || empty($_POST['pass3']) || empty($_POST['pass4'])){
        echo json_encode(array('error'=>'All field is missing')); exit;
    }

    if(!isset($_POST['cusname']) || empty($_POST['cusname'])){
        echo json_encode(array('error'=>'Please enter your name')); exit;
    }
    elseif(!isset($_POST['cusmail']) || empty($_POST['cusmail'])){
        echo json_encode(array('error'=>'Please enter your email')); exit;
    }
    elseif(!isset($_POST['cussaddress']) || empty($_POST['cussaddress'])){
        echo json_encode(array('error'=>'Please enter your address')); exit;
    }
    elseif(!isset($_POST['cussmob']) || empty($_POST['cussmob'])){
        echo json_encode(array('error'=>'Please enter your contact number')); exit;
    }
    elseif(!isset($_POST['pass3']) || empty($_POST['pass3'])){
        echo json_encode(array('error'=>'Please enter your password')); exit;
    }
    elseif(!isset($_POST['pass4']) || empty($_POST['pass4'])){
        echo json_encode(array('error'=>'Please re-enter your password')); exit;
    }
    else{

            $pass=password_hash($password, PASSWORD_BCRYPT);
            $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

            $token= bin2hex(random_bytes(15));

            $emailquery="select * from signup where customer_email='$email' ";
            $query=mysqli_query($conn,$emailquery);
            $email_count=mysqli_num_rows($query);
            if($email_count>0){
                echo json_encode(array('error'=>'Email already exists')); exit;
            }
            else{

                if(!empty($username) && !empty($email) && !empty($mobile) && !empty($password) &&!empty($cpassword)){
                if(!empty($username)){
                                        
                    if(!empty($email)){ 
                            
                        if(!empty($addr)){
                    
                            if(!empty($mobile)){

                                if(!empty($password)){

                                    if(!empty($cpassword)){
                
                                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                                                if(preg_match($pattern, $password)){

                                                    if($password === $cpassword){

                                                            $insertqry="INSERT INTO signup(customer_name,
                                                            customer_email, customer_address, phone_no, passwords, conf_password,token,statuss)
                                                            VALUES('$username','$email','$addr','$mobile','$pass','$cpass','$token','inactive')";

                                                            $iqry=mysqli_query($conn,$insertqry);
                                                            
                                                            if($iqry){
                                                                
                                                                $subject="Email Activation";
                                                                $body="Hi, $username. Click here to activate your account 
                                                                http://localhost/ecommerce/activate.php?token=$token ";
                                                                $sender_email="From: anupam.siwakoti@gmail.com";


                                                                    if(mail($email,$subject,$body,$sender_email)){
                                                                        $_SESSION['msg']="check your mail to activate your account $email";
                                                                        header('location:login.php');
                                                                    }
                                                                    else{
                                                                        echo "Email sending failed...";
                                                                        echo json_encode(array('error'=>'new passwords doesnt match with each other')); exit;
                                                                    }
                                                            
                                                            }
                                                                else{
                                                                    echo json_encode(array('error'=>'Error occurs while creating an account')); exit;

                                                                }
                                                    }
                                                    else{
                                                        echo json_encode(array('error'=>'Password are not matching')); exit;
                                                        }
                                                }
                                                else{
                                                    echo json_encode(array('error'=>'Password must contain a capital letter, a number and a symbol(!$%^&)')); exit;
                                                }
                                        }
                                        else{
                                                echo json_encode(array('error'=>'Provided email is invalid, please provide valid Email')); exit;
                                            }
                                    }
                                    else{
                                            echo json_encode(array('error'=>'Please re-enter password for validation!!')); exit;
                                    }
                                }
                                else{
                                    echo json_encode(array('error'=>'Password is missing!!')); exit;
                                }
                            }
                            else{
                            echo json_encode(array('error'=>'Phone number is missing!!')); exit;
                            }
                        }
                        else{
                            echo json_encode(array('error'=>'Address is missing!!')); exit;
                        }
                    }
                    else{
                        echo json_encode(array('error'=>'Email is missing!!')); exit;
                    }
                }
            
                else{
                    echo json_encode(array('error'=>'Username is missing!!')); exit;
                }   

            }else{
                echo json_encode(array('error'=>'All field is missing!!')); exit;
            }
            }        
            }
        }
 