<?php
include '../../config.php';

if(isset($_POST['login'])){
		if(!isset($_POST['username']) || empty($_POST['username'])){
			echo json_encode(array('error'=>'Username Field is Empty.')); exit;
		}elseif(!isset($_POST['password']) || empty($_POST['password'])){
			echo json_encode(array('error'=>'Passowrd Field is Empty.')); exit;
		}else{
            $Email=$_POST['username'];
            $pass=$_POST['password'];
            $email_search="SELECT * FROM trader WHERE email='$Email'";
            $query=mysqli_query($conn,$email_search);
            $email_count=mysqli_num_rows($query);

			if($email_count > 0){

                                $email_pass=mysqli_fetch_assoc($query);
                                $d_pass=$email_pass['password'];

                        if ($pass == $d_pass){ 
                                
                                session_start();
                                $_SESSION['trader_username']=$email_pass['trader_name'];
                                $_SESSION['trader_id']=$email_pass['trader_id'];

                                echo json_encode(array('success'=>'Logged In Successfully.')); exit;

                        }
                        else{
                            echo json_encode(array('error'=>'Username and Password not matched.')); exit;
                        }
                }
        }
}  
       
?>