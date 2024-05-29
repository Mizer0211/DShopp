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

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/Adminstyle.css">
    <link rel="icon" type="image/x-icon" href="../foto/icon/Icon.ico">
    <title>Admin Page</title>
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

        <div class="Admin_Container">

        <div class="Admin_Actions_Container">
            
        <div class="Admin_txt"><h1>Administratora lapa</h1></div>

            <div class="Admin_action_btn_container">

                <div class="left_actions">

                    <div class="Action_Button_1">
                        <a class="action_button_a" href="AddProduct.php">Preces</a>
                    </div>    
                    <div class="Action_Button_2">
                        <a class="action_button_a" href="Users.php">Lietotāji</a>
                    </div>

                </div>

                <div class="right_actions">

                    <div class="Action_Button_1">
                        <a class="action_button_a" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=desktopshop" target="_blank">Atvērt Datubāzi</a>
                    </div>

                    <div class="Action_Button_2">
                        <a class="action_button_a" href="Profile.php">Atpakaļ uz profilu</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>

