<?php include('server.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desktopshop";
$conn = mysqli_connect($servername, $username, $password, $dbname,);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = "SELECT user_id FROM users";
$sql = "SELECT * FROM cart WHERE user_id='$id'";
$results = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/cartstyle.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="/foto/icon/Icon.ico">
    <title>Groza</title>
</head>
<body>
    <div class="content">
        <header>
            <div class="navmenu">
                <nav class="navbar">
                    <ul class="flex-container space-between">
                        <li class="flex-item"><a class="navigation" href="Desktop_Shop.php">Veikals</a></li>
                        <li class="flex-item"><a class="navigation" href="Service.php">Serviss</a></li>
                        <li class="flex-item"><a class="navigation" href="Delivery.php">Piegade</a></li>
                        <li class="flex-item"><a class="navigation" href="Kontakti.php">Kontakti</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="cart-container">
            
            <div class="cart-title">
                <div class="back-to-profile"><a href="Profile.php">Atpakal uz profilu</a></div>
                <h1>Mana groza</h1>
            </div>

            <div class="item-container">
                <table class="table-container">

                    <tr class="table-headers">
                        <th>Prece</th>
                        <th>Apraksts</th>
                        <th>Cena</th>
                    </tr>

                    <tr class="table-item-container">

                        <th class="cart-product-list-1">
                            <div class="item-image-container">
                                <img class="item-image" src="foto/atb/MouseDart.png">
                                <a href="Dart.php" class="cart-product-link">HyperX Pulsefire Dart</a>
                            </div>
                        </th>
                        <th class="cart-product-list-description">
                            <div class="cart-product-lict-pos">
                                <div class="product-description">
                                    <h4>Mouse HyperX paradīta datorspēlem un vienkāršam darbam</h4>
                                </div>
                            </div>
                            
                        </th>
                        <th class="cart-product-list">
                            <h4>59,99 €</h4>
                        </th>

                        <th class="cart-product-list-end">
                            <h4><a href="#">Dzēst preci</a></h4>
                        </th>

                    </tr>
            </div>

        </div>

    </div>
</body>
</html>