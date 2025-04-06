<body>
    <header>
        <div class="logo">
            <img src="./includes/website_logo.png" alt="Website_logo">
        </div>
        <ul class="nav-list">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./order.php?user_id=<?php echo $_SESSION['id'];?>">Orders</a></li>
            <li><a href="./cart.php?user_id=<?php echo $_SESSION['id'];?>">Cart</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./controllers/logout.php">Log-out</a></li>
        </ul>
        <span class="nav-btn" id="navbtn">&#9776;</span>
        </div>
    </header>