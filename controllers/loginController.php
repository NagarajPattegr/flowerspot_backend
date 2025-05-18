<?php
    session_start();
    include('../config/dbconnection.php');
    $db =new DataBase();
    $connection = $db->connect();
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if($connection){
            $email  = filter_input(INPUT_POST , 'email' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST , 'password' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $query = "SELECT * FROM users WHERE email='$email'";
            try{
                $result = mysqli_query($connection , $query);
                if(mysqli_num_rows($result)>0){
                    $user = mysqli_fetch_assoc($result);
                     if(password_verify($password , $user['password'])){
                        $_SESSION['id'] = $user['id'];
                        if($user['email']=='adminflowerspot@gmail.com'){
                            echo "admin";
                        }else{
                            echo "success";
                        }
                    }else{
                        echo "Password is wrong";
                    }
                }
                else{
                    echo "User not exitst , Please register";
                }
            }catch(mysqli_sql_exception){
                echo "Error";
            }
        }
    }
?>