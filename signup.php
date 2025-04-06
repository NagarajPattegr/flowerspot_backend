<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="./css/forms.css">
    <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <div id="container">
    <img src="./includes/website_logo.png" alt="website logo">
        <h1>Signup</h1>
        <form action="./controllers/signupController.php" method="POST" id="myform">
        <div id="error">Fill all feids</div>
        <div>
            <label >Name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter name"  required><br>
        </div>
        <div>
            <label >Email</label><br>
            <input type="email" id="email" name="email" placeholder="Enter email" required><br>
        </div>
        <div>
            <label >Password</label><br>
            <input type="password" id="password" name="password" placeholder="Enter password" required><br>
        </div>
        <div>
            <label >Address</label><br>
            <input type="text" id="address" name="address" placeholder="Enter address" required><br>
        </div>
        <div>
            <label >City</label><br>
            <input type="text" id="city" name="city" placeholder="Enter city" required><br>
        </div>
        <div>
            <label >Pin-code</label><br>
            <input type="text" id="pin" name="pin" placeholder="Enter pincode" required><br>
        </div>
        <div id="submit">
            <a href="login.php">You already have account , <u>Login</u></a>
            <input type="submit" id="submit" name="submit" value="submit"><br>
        </div>
        </form>
    </div>
    <?php include("./includes/footer.php"); ?>
    <script src="./js/signup.js"></script>
</body>
</html>