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

$sql = "SELECT * FROM product WHERE category='peles'";
$results = mysqli_query($conn, $sql);

$db = mysqli_connect('localhost', 'root', '', 'desktopshop');
$query = mysqli_query($db, "SELECT * FROM product");

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/mousesstyle.css" rel="stylesheet" type="text/css">
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
        <a class="logobutton" href="Desktop_Shop.php"><img class="logo" src="foto/logo/mainlogotype.png"></a>
        <div class="location">
            <a class="locate" href="Desktop_Shop.php">DShop</a>
            <h3 class="hloc">></h3>
            <a class="locate" href="Mouse.php">Peles</a>
        </div>

        <!-- For Search Function 
        <div class="searchdiv">
            <form method="post">
                <input type="text" name="search" class="search-input" placeholder="Meklēt...">
                <input class="submit-button" type="submit" name="submit" value="Meklēt">
            </form>
        </div>
        <div class="lgse">   -->

            <div class="searchdiv">
                <input class="search-input" type="text" placeholder="Meklēt..." name="search">
                <div class="sumbit_div">
                    <input class="submit-input" type="submit" name="submit" value="Meklēt">
                </div>
            </div>
        </div>
    </div>

    <div class="object">
        <?php
        foreach ($results as $category=>$result) {
            echo '
        <div class="mouse">
            <div class="mouse-header">
                <a class="mouselink"><span class="Name">'.$result['title'].'</span></a>
                <a><img class="mouseimg" src=""><a>
            </div>

            <div class="mousedisc">
                <div class="mouse-text-disc">
                    <h4>'.$result['specification'].'</h4>
                </div>
                
                <div class="action">
                    <a class="mouse_price">'.$result['price'].' €</a>
                    <button class="show-more-about_product"><a href="Dart.php? id='.$result['product_id'].'">Show More</a></button>
                </div>
            </div>
        </div>';
        }
        ?>
        <?php
        if (isset($_POST['submit'])){
            $search = $_POST['search'];
            $query = mysqli_query($db, "SELECT * FROM product WHERE title LIKE '%$search%' OR specification LIKE '%$search%'");
            while($row = mysqli_fetch_assoc($query)) echo "<h1>" .$row['title']."</h1><p>".$row['specification']."</p><br>";
        }        
        ?>
    </div>
</body>
</html>