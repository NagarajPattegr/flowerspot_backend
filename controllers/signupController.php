<?php
    include('../config/dbconnection.php');
    $db =new DataBase();
    $connection = $db->connect();
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if($connection){
            $name =filter_input(INPUT_POST , 'name' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $email  = filter_input(INPUT_POST , 'email' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST , 'password' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST , 'address' ,    FILTER_SANITIZE_SPECIAL_CHARS);
            $city = filter_input(INPUT_POST , 'city' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $pincode = filter_input(INPUT_POST , 'pin' ,FILTER_SANITIZE_SPECIAL_CHARS);
            $query = "SELECT * FROM users WHERE email='$email'";
            try{
                $result = mysqli_query($connection , $query);
                if(mysqli_num_rows($result)>0){
                    echo "User already exits";
                    return ;
                }
            }catch(mysqli_sql_exception){
                echo "Error";
            }
            $hash = password_hash($password , PASSWORD_DEFAULT);
            $query = "INSERT INTO users (user_name , email , password , address , city , pincode) VALUES ('$name' , '$email' , '$hash' , '$address' , '$city' , '$pincode')";
            $result = $db->insertData($connection,$query);
            if($result == "success"){
                echo "success";
            }else{
                echo "Can`t register";
            }
        }
    }
?>