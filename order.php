<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order</title>
  <link rel="stylesheet" href="./css/navigation.css">
  <link rel="icon" href="./includes/website_logo.png">
</head>

<body>
  <?php include('./includes/nav.php'); ?>
  <script src="./js/nav.js"></script>
</body>
</html>