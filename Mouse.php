<?php
include('server.php');

// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desktopshop";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$output = '';

// Check if search form is submitted
if (isset($_POST['search'])) {
    $q = mysqli_real_escape_string($conn, $_POST['q']);
    $sql = "SELECT * FROM product WHERE title LIKE '%$q%' AND category='peles'";
} else {
    $sql = "SELECT * FROM product WHERE category='peles'";
}

$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $output .= '
        <div class="product">
            <div class="product-header">
                <a class="productlink"><span class="Name">'.$row['title'].'</span></a>
                <a><img class="productimg" src="foto/atb/mousedart.png"></a>
            </div>
            <div class="productdisc">
                <div class="product-text-disc">
                    <h4>'.$row['specification'].'</h4>
                </div>
                <div class="action">
                    <a class="product_price">'.$row['price'].' €</a>
                    <button class="show-more-about_product"><a href="Dart.php?id='.$row['product_id'].'">Show More</a></button>
                    <button class="add-to-cart"><a href="AddToCart.php?id='.$row['product_id'].'">Add To Cart</a></button>
                </div>
            </div>
        </div>';
    }
} else {
    $output = '<h2>No results found!</h2>';
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/pproductstyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="/foto/icon/Icon.ico">
    <title>Mouses</title>
</head>
<body>
    <header>
        <div class="navmenu">
            <nav class="navbar">
                <ul class="flex-container space-between"> 
                    <li class="flex-item"><a class="navigation" href="Desktop_Shop.php">Veikals</a></li>
                    <li class="flex-item"><a class="navigation" href="Service.php">Service</a></li>
                    <li class="flex-item"><a class="navigation" href="Delivery.php">Piegāde</a></li>
                    <li class="flex-item"><a class="navigation" href="Contacts.php">Kontakti</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="lgse">
        <a class="logobutton" href="Desktop_Shop.php"><img class="logo" src="foto/logo/mainlogotype.png"></a>
        <div class="location">
            <a class="locate" href="Desktop_Shop.php">DShop</a>
            <h3 class="hloc">></h3>
            <a class="locate" href="Mouse.php">Peles</a>
        </div>

        <div class="searchdiv">
            <form method="POST" action="">
                <input class="search-input" type="text" name="q" placeholder="Meklēt">
                <input class="submit-input" type="submit" name="search" value="Meklēt">
            </form>
        </div>
    </div>

    <div class="object">
        <?php echo $output; ?>
    </div>
</body>
</html>