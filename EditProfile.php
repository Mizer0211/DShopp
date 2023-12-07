<?php include('server.php');

$db = mysqli_connect('localhost', 'root', '', 'desktopshop');

$id = 'user_id';

$sql = "SELECT * FROM users WHERE user_id='$id'";


$result = mysqli_query($db, $sql)->fetch_assoc();


if (isset($_POST['edit_profile'])) {
    $name = mysqli_real_escape_string($db, $_POST['edit_name']);
    $email = mysqli_real_escape_string($db, $_POST['edit_email;']);
  
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }

    if (count($errors) == 0) {
      $email =strtolower($email);
      $query = "UPDATE users SET user_name='$name', user_email='$email' WHERE user_id='$id'";
      mysqli_query($db, $query);
    }
    header("Location: Profile.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/EditProductstyle.css">
    <title>Edit Product</title>
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

        <div class="edit-container">
            <div class="form-container">
                <form method="post">
                    <div class="product-category-container">
                        <label for="lname">Name</label><br>
                        <input type="text" name="edit_category" value="<?php echo $result['user_name'];?>"><br>
                    </div>
                    <div class="product-price-container">
                        <label for="lname">Email</label><br>
                        <input type="text" name="edit_price" value="<?php echo $result['user_email'];?>"><br><br>
                    </div>
                    <div class="edit-button-container">
                        <button class="edit_button"><a href="Profile.php">Cancel</a></button>
                        <button type="submit" class="edit_button" name="edit_profile">Edit Product</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>