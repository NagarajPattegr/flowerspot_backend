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
    <style>
        form {
            max-width: 400px;
            margin: auto;
        }
        input, select {
            display: block;
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Checkout Form</h2>

<form action="place_order.php" method="POST">
    <label for="address">Address</label>
    <input type="text" name="address" required value="<?php echo htmlspecialchars($address); ?>">

    <label for="city">City</label>
    <input type="text" name="city" required value="<?php echo htmlspecialchars($city); ?>">

    <label for="pincode">Pincode</label>
    <input type="text" name="pincode" required value="<?php echo htmlspecialchars($pincode); ?>">

    <label for="payment">Payment Method</label>
    <select name="payment_method" required>
        <option value="cod">Cash on Delivery</option>
    </select>

    <input type="submit" value="Place Order">
</form>
<script src="./js/checkoutPage.js"></script>
</body>
</html>