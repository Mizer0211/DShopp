<?php
    if (isset($_POST['submit'])){
        header("Location: searchh.php");
        $search = $_POST['search'];
        $query = mysqli_query($db, "SELECT * FROM product WHERE title LIKE '%$search%' OR specification LIKE '%$search%'");
        while($row = mysqli_fetch_assoc($query)) echo "<h1>" .$row['title']."</h1><p>".$row['specification']."</p><br>";
    }        
?>