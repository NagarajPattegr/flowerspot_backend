<?php
session_start();
include('./config/dbconnection.php'); 
$db =new DataBase();
$connection = $db->connect();
if (!isset($_SESSION['id'])) {
    echo "Please log in to proceed with checkout.";
    exit;
}

$id = $_SESSION['id'];

$sql = "SELECT address, city, pincode FROM users WHERE id = $id";
$result = mysqli_query($connection , $sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $address = $row['address'];
    $city = $row['city'];
    $pincode = $row['pincode'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout Page</title>
    <link rel="stylesheet" href="./css/forms.css">
</head>
<body>
<div id="container">
<h2 >Checkout Form</h2>
<form action="place_order.php" method="POST" id="myform">
    <div>
    <label for="address">Address</label>
    <input type="text" name="address" required value="<?php echo htmlspecialchars($address); ?>">
    </div>
    <div>
    <label for="city">City</label>
    <input type="text" name="city" required value="<?php echo htmlspecialchars($city); ?>">
    </div>
    <div>
    <label for="pincode">Pincode</label>
    <input type="text" name="pincode" required value="<?php echo htmlspecialchars($pincode); ?>">
    </div>
    <div>
    <label for="payment">Payment Method</label>
    <select name="payment_method" required class="dropdown">
        <option value="cod">Cash on Delivery</option>
    </select>
    </div>
    <input type="submit" value="Place Order">
</form>
</div>
<script src="./js/checkoutPage.js"></script>
</body>
</html>