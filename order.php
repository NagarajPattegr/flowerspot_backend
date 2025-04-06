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
    <title>Orders</title>
   <link rel="icon" href="./includes/website_logo.png">
   <link rel="stylesheet" href="./css/order.css">
   <link rel="stylesheet" href="./css/footer.css">
   <link rel="stylesheet" href="./css/navigation.css">
</head>
<body
 <?php include("./includes/nav.php");?>
    <main>
        <div class="ordercontainer">
            
        </div>
    </main>
    <?php include("./includes/footer.php"); ?>
    <script src="./js/nav.js">
    </script>
      <script src="./js/order.js"></script>
</body>
</html>