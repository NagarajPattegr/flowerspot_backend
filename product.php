<?php
 session_start();
 if(!isset($_SESSION['id']) && isset($_SESSION['user_name'])){
   header("Location:login.php");
   exit();
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productpage</title>
    <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>
<main>
        <div id="session" style="color:transparent;"><?php echo $_SESSION['id'];?></div>
        <section class="product-details">
            <div class="product-image">
                <img id="productImage" src="" alt="Product Image">
            </div>
            <div class="product-info">
                <h1 id="productName"></h1>
                <p id="productDescription"></p>
                <h2 id="productPrice">&#8377</h2>
                <p id="productType"></p>
                <a  id="buyNowBtn">Buy Now</a>
                <a id="addToCartBtn">Add to Cart</a>
            </div>
        </section>

        <section class="product-reviews">
            <h2>Customer Reviews</h2>
            <div id="reviewsContainer">
            <form id="reviewForm"?>
                <textarea id="reviewText" placeholder="Write a review..." required></textarea>
                <button type="button" id="submit">Submit Review</button>
            </form>
        </div>
        <div id="review-section">
                
        </div>
        </section>
    </main>
<script src="./js/productPage.js"></script>
</body>
</html>

