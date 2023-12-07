
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/search.css" rel="stylesheet" type="text/css"/>
    <title>Search</title>
</head>
<body>
    <div class="search-container">
        <div class="display-container">
                <!-- Search form -->
            <form method="post">
                <input type="text" name="search" placeholder="Search..." required>
                <input type="submit" value="Search" class="search-btn">
            </form>

            <?php
                $link= new mysqli("localhost","root","","desktopshop");
                $name = $_POST['search'];

                // Check database connection
                if (mysqli_connect_errno())
                {
                    echo "Failed to connect to Database: " . mysqli_connect_error();
                }
                $result = mysqli_query($link, "SELECT * FROM product WHERE title LIKE '%{$name}%' OR specification LIKE '%{$name}%'");
                while ($row = mysqli_fetch_array($result))
                {
                    echo $row['title'] . " | " . $row['specification'];
                    echo "<br>";
                }
                mysqli_close($link);
            ?>

        </div>
        
    </div>

</body>

</html>