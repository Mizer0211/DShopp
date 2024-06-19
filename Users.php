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

$sql = "SELECT * FROM users";
$results = mysqli_query($conn, $sql);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/users.css">
    <link rel="icon" type="image/x-icon" href="../foto/icon/Icon.ico">
    <title>Users Page</title>
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
                </ul>
            </nav>
        </div>
    </header>
</div>

<div class="back_to_AP_button">
    <a class="back_AP_a"href="Adminpage.php">Atpakaļ</a>
</div>

<div class="ap_content">

    <div class="table_container">
        <table>
            <tr class="table-header">
                <th>Lietotāja ID</th>
                <th>Lietotājsvārds</th>
                <th>E-pasts</th>
                <th>Rediģēt</th>
            </tr>
            <?php
            foreach ($results as $id=>$result) {
                echo '
                <tr>
                    <td>'.$result['user_id'].'</td>
                    <td>'.$result['user_name'].'</td>
                    <td>'.$result['user_email'].'</td>
                    <td>
                        <button class="edit_button"><a href="EditUser.php? id='.$result['user_id'].'">Rediģēt</a></button>
                        <button class="delete_button"> <a href="DeleteUser.php? id='.$result['user_id'].'"> Dzēst </a> </button>
                    </td>
                </tr>';
            }
            ?>       
        </table>
    </div>
</div>


</body>