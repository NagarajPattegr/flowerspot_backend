<?php
    session_start();
    include('../config/dbconnection.php');
    $db =new DataBase();
    $connection = $db->connect();
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if($connection){
            $data = json_decode(file_get_contents("php://input"), true);
            if(isset($data['id']) && isset($data['flowerId'])){
            $user_id = $data['id'];
            $flower_id = $data['flowerId'];
                try{
                    $query = "INSERT INTO cart (product_id,user_id) VALUES ('$flower_id','$user_id')";
                    $res = mysqli_query($connection , $query);
                    if($res){
                        echo "Sucess";
                    }
                    else{
                        echo "Not sucess";
                    }
                }
                catch(mysqli_sql_exception){
                    echo "Error";
                }
            }
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'GET' ){
        if($connection){
            try{
                $id = $_GET['id'];
                $query = "
                SELECT cart.*, flowers.flower_name AS flower_name, flowers.price, flowers.image , flowers.type,
                flowers.description ,flowers.flower_id,
                cart.cart_id
                FROM cart
                INNER JOIN flowers ON cart.product_id = flowers.flower_id
                WHERE cart.user_id = '$id'
            ";
                try{
                $res = mysqli_query($connection , $query);
                if(mysqli_num_rows($res)>0){
                    $cartData=array();
                    while($data = mysqli_fetch_assoc($res)){
                        $cartData[] = $data;
                    }
                    $cartData = json_encode($cartData);
                    echo $cartData;
                }
                else{
                    echo "Not sucess";
                }
                }catch(mysqli_sql_exception){
                    echo "Error ocurres";
                }
            }
            catch(mysqli_sql_exception){
                echo "Error";
            }
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'DELETE' ){
        if($connection){
                $id = $_GET['id'];
                $query = "DELETE FROM cart WHERE cart_id = '$id'";
                try{
                $res = mysqli_query($connection , $query);
                if(($res)){
                    echo "Success - $id";
                }
                else{
                    echo "Not sucess";
                }
                }catch(mysqli_sql_exception){
                    echo "Error ocurres";
                }
            }
    }
?>
