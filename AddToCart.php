<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desktopshop";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_SESSION['user_id'])) {
    die("User is not logged in");
}

$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];


$user_check_query = "SELECT * FROM users WHERE user_id = $user_id";
$user_check_result = mysqli_query($conn, $user_check_query);
if (mysqli_num_rows($user_check_result) == 0) {
    die("User does not exist");
}


$product_query = "SELECT * FROM product WHERE product_id = $product_id";
$product_result = mysqli_query($conn, $product_query);
if (mysqli_num_rows($product_result) == 0) {
    die("Product does not exist");
}

$product = mysqli_fetch_assoc($product_result);
$product_title = $product['title'];
$product_price = $product['price'];

$check_cart_query = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
$check_cart_result = mysqli_query($conn, $check_cart_query);

if (mysqli_num_rows($check_cart_result) > 0) {


} else {

    echo "Product ID: $product_id<br>";
    echo "Product Title: $product_title<br>";
    echo "Product Price: $product_price<br>";


    $insert_cart_query = "INSERT INTO cart (product_id, product_title, product_price, total_amount) VALUES ($product_id, '$product_title', $product_price, $product_price)";
    if (mysqli_query($conn, $insert_cart_query)) {
        echo "Product added to cart successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// header("Location: Mouse.php");
// exit();

mysqli_close($conn);
?>
