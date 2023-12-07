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
    <link rel="icon" type="image/x-icon" href="../foto/icon/Icon.ico">
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
                <h1>Mana groza</h1>
            </div>

            <div class="item-container">
                <table class="table-container">

                    <tr class="table-headers">
                        <th>Prece</th>
                        <th>Nosaukums</th>
                        <th>Skaits</th>
                        <th>Cena par gabalu</th>
                        <th>Kopējā cena</th>
                    </tr>

                    <tr class="table-item-container">

                        <th class="cart-product-list-1">
                            <div class="item-image-container">
                                <img class="item-image-1" src="foto/atb/MouseDart.png">
                            </div>
                        </th>
                        <th class="cart-product-list">
                            <a href="Dart.html" class="cart-product-link">HyperX Pulsefire Dart</a>
                        </th>
                        <th class="cart-product-list-amount">
                            <div class="cart-product-lict-pos">
                                <div class="product-amount">
                                    <h4>1 gab.</h4>
                                </div>
                                <a class="more-amount" href="">
                                    <img src="foto/atb/plus2.png" class="plus-image">
                                </a>
                            </div>
                            <a href="#" class="delete-product">Izdzēst preci</a>
                            
                        </th>
                        <th class="cart-product-list">
                            <h4>59,99 €</h4>
                        </th>

                        <th class="cart-product-list-end">
                            <h4>59,99 €</h4>
                        </th>

                    </tr>
                    <?php
                    foreach ($results as $id=>$result) {
                        echo '
                        <tr>
                            <td>'.$result['product_picture'].'</td>
                            <td>'.$result['product_title'].'</td>
                            <td>'.$result['product_price'].'€</td>
                            <td>'.$result['total_amount'].'€</td>
                            <td>.
                            <td>
                                <button class="edit_button"><a href="EditProduct.php? id='.$result['product_id'].'">Edit</a></button>
                                <button class="delete_button"> <a href="DeleteProduct.php? id='.$result['product_id'].'"> Delete </a> </button>
                            </td>
                        </tr>';
                    }
                    ?>
            </div>

        </div>

    </div>
</body>
</html>