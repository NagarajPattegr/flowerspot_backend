<?php
 session_start();
 if(!isset($_SESSION['id'])){
   header("Location:login.php");
   exit();
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/cart.css">
</head>
<body>
<?php include('./includes/nav.php');?>
<main>
    <div class="cartcontainer">

    </div>
  </main>
  <script src="./js/cart.js"></script>
  <script src="./js/nav.js"></script>
</body>
</html>