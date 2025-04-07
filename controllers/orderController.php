<?php
include('../config/dbconnection.php');
$db = new DataBase();
$connection = $db->connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($connection) {
        $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : NULL;
        $fid = isset($_GET['fid']) ? intval($_GET['fid']) : NULL;
        $price = $_GET['price'];

        $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : '';
        $city = isset($_POST['city']) ? htmlspecialchars(trim($_POST['city'])) : '';
        $pincode = isset($_POST['pincode']) ? htmlspecialchars(trim($_POST['pincode'])) : '';
        $payment_method = isset($_POST['payment_method']) ? htmlspecialchars(trim($_POST['payment_method'])) : '';
        echo "$price<br>";
        $query = "INSERT INTO orders (user_id , address , city , pincode ,payment_method , flower_id , price ) VALUES ('$user_id' , '$address' , '$city' , '$pincode' , '$payment_method', '$fid' , '$price')";
        try {
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "success";
            } else {
                echo "Not sucess";
            }
        } catch (mysqli_sql_exception) {
            echo "Error";
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET' ){
    if($connection){
        try{
            $id = $_GET['id'];
            $query = "
            SELECT orders.*, flowers.flower_name AS flower_name, flowers.price, flowers.image , flowers.type,
            flowers.description ,flowers.flower_id
            FROM orders
            INNER JOIN flowers ON orders.flower_id = flowers.flower_id
            WHERE orders.user_id = '$id'
        ";
            try{
            $res = mysqli_query($connection , $query);
            if(mysqli_num_rows($res)>0){
                $orderData=array();
                while($data = mysqli_fetch_assoc($res)){
                    $orderData[] = $data;
                }
                $orderData = json_encode($orderData);
                echo $orderData;
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
?>