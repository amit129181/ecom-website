<?php
                            include "../config.php";

                            session_start();
                            $name =$_SESSION['id'];
                           
                            if(isset($_POST['pass'])){

                                if(!isset($_POST['pass']) || empty($_POST['pass'])){
                                    echo json_encode(array('error'=>'Please enter old password')); exit;
                                }
                                elseif(!isset($_POST['pass1']) || empty($_POST['pass1'])){
                                    echo json_encode(array('error'=>'New password is empty.')); exit;
                                }elseif(!isset($_POST['pass2']) || empty($_POST['pass2'])){
                                    echo json_encode(array('error'=>'Re-enter new password. ')); exit;
                                }else{

                                $password=$_POST['pass'];
                                $password1=$_POST['pass1'];
                                $password2=$_POST['pass2'];

                                $customersql1=" SELECT passwords FROM signup WHERE customer_id='$name' ";

                                $customer_query1=mysqli_query($conn,$customersql1);

                                $customer_id1=mysqli_fetch_assoc($customer_query1) or die("query didnt worked");
                                $pass = $customer_id1['passwords'];
                                $verify = password_verify($password, $pass);

                                    if ($verify) {
                                        if(preg_match('/[A-Z]+/', $password1) && preg_match('/[0-9]+/', $password1) && preg_match('/[!$%^&]+/', $password1)){
                                            if($password1 == $password2){
                                                $pass=password_hash($password1, PASSWORD_BCRYPT);
                                                $emailquery="UPDATE signup SET passwords='$pass', conf_password='$pass' WHERE customer_id = $name ";
                                                $query=mysqli_query($conn,$emailquery);
                                                echo json_encode(array('success'=>'npassword changed successfully')); exit;
                                            }
                                            else{
                                                echo json_encode(array('error'=>'new passwords doesnt match with each other')); exit;
                                            }
                                        }
                                        else{
                                            echo json_encode(array('error'=>'Password must contain a capital letter, a number and a symbol(!$%^&)')); exit;
                                        }
                                    } 
                                    else {
                                        echo json_encode(array('error'=>'Incorrect Old Password!!!!')); exit;
                                    }
                                }
                            }
                         ?>