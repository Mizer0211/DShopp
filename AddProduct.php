<?php include('server.php');

// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desktopshop";
$conn = mysqli_connect($servername, $username, $password, $dbname,);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM product";
$results = mysqli_query($conn, $sql);

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/addstyle.css">
    <link rel="icon" type="image/x-icon" href="../foto/icon/Icon.ico">
    <title>Add Product</title>
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
        <div class="product-editor-container">
            <div class="back_to_AP_button">
                <a class="back_AP_a"href="Adminpage.php">Atpakaļ</a>
            </div>
            <div class="form-container">
                <form action="AddProduct.php" method="post">
                    <div>
                        <label for="fname">Preces nosaukums :</label><br>
                        <input type="text" name="title"><br>
                    </div>
                    <div>
                        <label for="lname">Preces kategorija :</label><br>
                        <input class="choice-input" list="choice" name="category" placeholder="Izvēle"/><br>
                        <datalist id="choice">
                            <option value="Datori">
                            <option value="Monitori">
                            <option value="Datoru perifērija">
                            <option value="Datoru aksesuari">
                        </datalist>
                    </div>
                    <div>
                        <label for="lname">Preces apraksts :</label><br>
                        <input type="text" name="specification"><br>  
                    </div>
                    <div>
                        <label for="lname">Preces cena :</label><br>
                        <input type="text" name="price"><br><br>
                    </div>
                    <div class="add-button-container">
                        <button type="submit" class="btn" name="add_product">Pievienot produktu</button>
                    </div>
                </form>
            </div>
            <div class="table-container">
                <table>
                    <tr class="table-header">
                        <th>Nosaukums</th>
                        <th>Kategorija</th>
                        <th>Preces Apraksts</th>
                        <th>Cēna</th>
                        <th>Rediģēt</th>
                    </tr>
                    <?php
                    foreach ($results as $id=>$result) {
                        echo '
                        <tr>
                            <td>'.$result['title'].'</td>
                            <td>'.$result['category'].'</td>
                            <td>'.$result['specification'].'</td>
                            <td>'.$result['price'].' €</td>
                            <td>
                                <button class="edit_button"><a href="EditProduct.php? id='.$result['product_id'].'">Rediģēt</a></button>
                                <button class="delete_button"> <a href="DeleteProduct.php? id='.$result['product_id'].'"> Dzēst </a> </button>
                            </td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>