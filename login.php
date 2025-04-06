<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/forms.css">
    <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
<div id="container">
        <img src="./includes/website_logo.png" alt="website logo">
        <h1>Login</h1>
        <form action="#" method="POST" id="myform">
        <div id="error">Fill all feids</div>
        <div>
            <label >Email</label><br>
            <input type="email" id="email" name="email" placeholder="Enter email" required><br>
        </div>
        <div>
            <label >Password</label><br>
            <input type="password" id="password" name="password" placeholder="Enter password" required><br>
        </div>
        <div id="submit">
        <a href="signup.php">You dont`t have account , <u>signup</u></a>
            <input type="submit" id="submit" name="submit" value="submit"><br>
        </div>
        </form>
    </div>
    <?php include("./includes/footer.php"); ?>
    <script src="./js/login.js"></script>
</body>
</html>