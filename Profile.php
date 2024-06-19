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

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    header("location: login.php");
}

// Pašreizējā lietotāja vērtības is_admin iegūšana
$user_id = $_SESSION['user_id']; 

$sql = "SELECT is_admin FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$is_admin = mysqli_fetch_assoc($result)['is_admin'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/profilestyle.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="/foto/icon/Icon.ico">
    <title>Profile</title>
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
                        <li class="flex-item"><a class="navigation" href="Contacts.php">Kontakti</a></li>
                        <?php 
                        // Vērtības is_admin pārbaude un pogas parādīšana atkarībā no tās
                        if ($is_admin == 1) {
                            echo '<li class="flex-item"><a class="navigation" href="Adminpage.php">AdminPage</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="sucesscontent">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </h3>
                </div>
            <?php endif ?>
        </div>

        <div class="profile-container">
            <div class="welcome">
                <!-- logged user information -->
                <?php  if (isset($_SESSION['username'])) : ?>
                    <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <?php endif ?>
            </div>
            <div class="title">
                <h1>Jūsu Profils</h1>
            </div>
            <div class="user-info-container">
                <div class="user-info">
                    <div class="user-logo-view">
                        <img class="profile-logo" src="foto/logo/user-logo-test.jpeg" alt="Avatar">
                        <!--<input type="file">-->
                    </div>
                    <div class="user-info-text">
                        <p>Vārds : <?php echo $_SESSION['username']; ?></p>
                        <p>Email : <?php echo $_SESSION['email']; ?></p>

                        <div class="btnchoicer">
                            <div class="changepasswordbtn">
                                <button class="change-password" type="button">
                                    <a href="#">Mainīt paroli</a>
                                </button>
                                <button class="change-user-info" type="button">
                                    <a href="EditProfile.php">Rediģēt profila datus</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>