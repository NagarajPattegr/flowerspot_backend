<?php
session_start();
  if(isset($_SESSION['id'])){
    if($_SESSION['id'] != 3){
    header("Location:login.php");
   exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Page</title>
    <link rel="stylesheet" href="./css/forms.css">
    <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/adminpage.css">
</head>
<body>
    <!-- <div id="formbl"></div> -->
    <div id="hero-section">
        <div id="outer-container">
            <div id="container">
                <h1>Add products</h1>
                <h1 id="msg"></h1>
                <form action="#" method="POST" id="myform">
                    <div>
                        <label>Flower Name</label><br>
                        <input type="text" id="flower_name" name="flower_name" placeholder="Enter flower name" required><br>
                    </div>
                    <div>
                        <label>Flower description</label><br>
                        <textarea name="flower_desc" id="product-desc"></textarea><br>
                    </div>
                    <div>
                        <label>Flower price</label><br>
                        <input type="text" id="flower-price" name="flower_price" placeholder="Enter flower price" required><br>
                    </div>
                    <div>
                        <label>Flower image (jpeg , jpg , png)</label><br>
                        <input type="file" id="flower-image" name="flower_image" required><br>
                    </div>
                    <div>
                        <label>Flower type</label><br>
                        <input type="text" id="flower-type" name="flower_type" required><br>
                    </div>
                    <div>
                        <input type="submit" id="submit" name="submit" value="submit"><br>
                    </div>
                </form>
            </div>
        </div>
        <div id="orders">
            <h1>Order details</h1>
            <?php
            include("./config/dbconnection.php");
            $db = new DataBase();
            $connection = $db->connect();
            $sql = "SELECT  users.user_name , flowers.flower_name ,flowers.image, orders.price , orders.address ,orders.city , orders.pincode , orders.payment_method, orders.order_date FROM orders JOIN users ON  orders.user_id = users.id JOIN flowers ON orders.flower_id = flowers.flower_id";
            $res = mysqli_query($connection, $sql);
            if(mysqli_num_rows($res)>0){
                $i=0;
                while($row = mysqli_fetch_assoc($res)){
                    echo "<div id='order_card'>";
                    echo ++$i."<br>";
                    echo "<h2>Order at {$row['order_date']}</h2>";
                    echo "<img src={$row['image']} alt='Image'><br>";              
                    echo "<p>Customer name : {$row['user_name']}</p><br>";
                    echo "<p>Flower name : {$row['flower_name']}</p><br>";
                    echo "<p>Flower price : {$row['price']}</p><br>";
                    echo "<p>Payment method : {$row['payment_method']}</p><br>";
                    echo "<p>Address : {$row['address']} - </p>";
                    echo "<p>City : {$row['city']} - </p>";
                    echo "<p>Pincode : {$row['pincode']}</p><br> ";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    <script src="./js/admin.js"></script>
</body>

</html>