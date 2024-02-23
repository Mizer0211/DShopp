<?php include('server.php');

// initializing variables

// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desktopshop";
$conn = mysqli_connect($servername, $username, $password, $dbname,);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM product WHERE category='peles'";
$results = mysqli_query($conn, $sql);

///$sql = "DELETE FROM product WHERE product_id='$product_id'";


mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/mmousesstyle.css" rel="stylesheet" type="text/css">
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
                    <li class="flex-item"><a class="navigation" href="Kontakti.php">Kontakti</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="lgse">
        <a class="logobutton" href="Desktop_Shop.php"><img class="logo" src="foto/Logo/mainlogotype.png"></a>
        <div class="location">
            <a class="locate" href="Desktop_Shop.php">DShop</a>
            <h3 class="hloc">></h3>
            <a class="locate" href="Mouse.php">Peles</a>
        </div>

        <div class="searchdiv">
            <input class="search-input" type="text" placeholder="Search">
            <div class="sumbit_div">
                <a class="sumbit_a" href="#">
                    <image class="searchph" src="foto/atb/search.svg"></image>
                </a>
            </div>
        </div>
    </div>

    <div class="object">
        <?php
        foreach ($results as $category=>$result) {
            echo '
        <div class="mouse">
            <div class="mouse-header">
                <a href="Dart.php" class="mouselink"><span class="Name">'.$result['title'].'</span></a>
                <a href="Dart.php"><img class="mouseimg" src=""><a>
            </div>

            <div class="mousedisc">
                <div class="mouse-text-disc">
                    <h4>'.$result['specification'].'</h4>
                </div>
                
                <div class="action">
                    <a class="mouse_price">'.$result['price'].' €</a>
                    <button class="add-product-to-cart" type="button"><a href="Cart.php">Add To Cart</a></button>
                </div>
            </div>
        </div>';
        }
        ?>
    </div>
</body>
</html>