<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Page</title>
    <link rel="stylesheet" href="./css/forms.css">
     <link rel="icon" href="./includes/website_logo.png">
    <link rel="stylesheet" href="./css/adminpage.css">
</head>
<body>
    <div id="hero-section">
        <div id="outer-container">
        <div id="container">
            <h1>Add products</h1>
            <h1 id="msg"></h1>
            <form action="#" method="POST" id="myform">
                <div>
                    <label>Flower Name</label><br>
                    <input type="text" id="flower_name" name="flower_name" placeholder="Enter flower name" required><br>
                </div>
                <div>
                    <label>Flower description</label><br>
                    <textarea name="flower_desc" id="product-desc"></textarea><br>
                </div>
                <div>
                    <label>Flower price</label><br>
                    <input type="text" id="flower-price" name="flower_price" placeholder="Enter flower price" required><br>
                </div>
                <div>
                    <label>Flower image (jpeg , jpg , png)</label><br>
                    <input type="file" id="flower-image" name="flower_image"  required><br>
                </div>
                <div>
                    <label>Flower type</label><br>
                    <input type="text" id="flower-type" name="flower_type"  required><br>
                </div>
                <div>
                    <input type="submit" id="submit" name="submit" value="submit"><br>
                </div>
            </form>
        </div>
        </div>
        <div id="orders"></div>
    </div>
    <script src="./js/admin.js"></script>
</body>
</html>