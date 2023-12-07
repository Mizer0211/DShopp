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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/pprofilestyle.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="/foto/icon/Icon.ico">
    <title>TestPage</title>
</head>
<body>
    <?php
    foreach ($results as $category=>$result) {
        echo '
        <tr>
            <td>'.$result['title'].'</td>
            <td>'.$result['category'].'</td>
            <td>'.$result['specification'].'</td>
            <td>'.$result['price'].' €</td>
            <td>
                <button class="edit_button"><a href="EditProduct.php? id='.$result['product_id'].'">Edit</a></button>
                <button class="delete_button"> <a href="DeleteProduct.php? id='.$result['product_id'].'"> Delete </a> </button>
            </td>
        </tr>';
    }
    ?>
</body>
</html>