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
   <title>Home</title>
   <link rel="stylesheet" href="./css/navigation.css">
   <link rel="icon" href="./includes/website_logo.png">
   <link rel="stylesheet" href="./css/indexfile.css">
 </head>
 <body>
   <?php include('./includes/nav.php');?>
   <main>
        <div class="herosection">
            <div class="herotext">
                <h1>Welcome to FlowerSpot: Your Oasis of Blooms</h1>
                <h2>Discover the Beauty and Serenity of Nature’s Finest Flowers</h2>
                <p>At FlowerSpot, we celebrate the vibrant world of flowers. From stunning bouquets to exotic plants, we
                    offer a wide variety of floral delights that bring joy, beauty, and tranquility to your life.
                    Whether you're looking to brighten your home, gift a loved one, or explore the wonders of flora,
                    FlowerSpot is your perfect companion.</p>
            </div>
        </div>
        <div class="selection">
            <button id="All">All</button>
            <button id="Decoration">Decoration</button>
            <button id="Gift">Gift</button>
        </div>
        <div class="container">
        </div>
    </main>
   <script src="./js/nav.js"></script>
   <script src="./js/indexpage.js"></script>
 </body>
 </html>