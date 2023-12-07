<?php
define("DB_HOST", "localhost");
define("DB_NAME", "desktopshop");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// Connect to database
$pdo = new PDO(
  "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
  DB_USER, DB_PASSWORD, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$db = mysqli_connect('localhost', 'root', '', 'desktopshop');

$query = "Select * from product";
$stmt = $db->prepare($query);
$stmt->execute();

$results = $stmt->get_result();
$data = $results->fetch_all(MYSQLI_ASSOC);


// Search
$stmt = $db->prepare("SELECT * FROM `product` WHERE `title` LIKE ? OR `specification` LIKE ?");
$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
if (isset($_POST["ajax"])) { echo json_encode($results); }