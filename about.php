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
    <title>About</title>
    <link rel="stylesheet" href="./css/navigation.css">
    <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/about.css">
</head>
<body>
<?php include('./includes/nav.php');?>
<main>
        <h1>Flower Spot</h1>
        <p>Welcome to Flower Spot, your go-to destination for fresh and beautiful flowers delivered right to your doorstep. At Flower Spot, we believe in the power of flowers to brighten up your day, celebrate special moments, and express emotions in the most delightful way.
        </p>
        <h2>Contact Us</h2>
        <p>Have questions or need assistance? Feel free to contact us at <i>flowerspot@gmail.com</i> or <i>8217062684</i>. We're here to help!</p>
        <h2>Social Media -</h2>
        <a href="https://www.facebook.com/profile.php?id=100054741586599&mibextid=ZbWKwL"><img src="./includes/facebook.png" alt="facebook"></a>
        <a href="https://www.instagram.com/nagaraj_ginivar?igsh=MWpqcW9vMjB3eTk5Yg=="><img src="./includes/instagram.png" alt="instagram"></a>
        <a href="https://x.com/Nagrajpattegar?t=wJAN_TCViWR4_UJliLsBkg&s=09"><img src="./includes/twitter.png" alt="X"></a>
    </main>
<?php include("./includes/footer.php"); ?>
<script src="./js/nav.js"></script>
</body>
</html>