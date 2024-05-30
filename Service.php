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

$sql = "SELECT * FROM service";
$results = mysqli_query($conn, $sql);

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/servicestyle.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="/foto/icon/Icon.ico">
    <title>Service</title>
</head>

<body>
    <div class="content">

        <header>
            <div class="navmenu">
                <nav class="navbar">
                    <ul class="flex-container space-between">
                        <li class="flex-item"><a class="navigation" href="Desktop_Shop.php">Veikals</a></li>
                        <li class="flex-item"><a class="navigation" href="Delivery.php">Piegade</a></li>
                        <li class="flex-item"><a class="navigation" href="Kontakti.php">Kontakti</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="service-container">

            <div class="service">
                <div class="title">
                    <a><h1>Saņemt servisa pakalpojumus</h1></a>
                </div>
                <div class="write-to-service">
                    <div class="person-data">
                        <div class="person-name">
                            <label class="person-data-label">Vards :</label>
                            <input class="person-data-input" name="user_name" type="text">
                        </div>
                        <div class="person-email">
                            <label class="person-data-label">Email :</label>
                            <input class="person-data-input" name="user_email" type="text">
                        </div>
                    </div>
                    <div class="dropdown">
                        <p>Lūdzu, norādiet ar kādu tipu ierīci saistīta jūsu problēma :</p>
                        <input class="choice-input" list="choice" name="product_category" placeholder="Izvēle"/>
                     <!--   <datalist id="choice">
                          <option id="choice-atb" value="Datoru">
                          <option value="Monitoru">
                          <option value="Datoru perifēriju">
                          <option value="Programmatūru">
                        </datalist>  -->
                    </div>
                </div>
                <div class="write-about">
                    <h3 class="write-about-text">Lūdzu, aprakstiet savu problēmu : </h3>
                    <textarea type="text" class="about-problem" name="problem_description" placeholder="..."></textarea>
                </div>
                <div class="sumbit-div-content">
                    <div class="sumbit-div">
                        <button type="submit" class="btn" name="send_request">Nosūtīt pieprasījumu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>