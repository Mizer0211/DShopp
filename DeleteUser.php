<?php include('server.php');

$db = mysqli_connect('localhost', 'root', '', 'desktopshop');

$id = $_GET['id'];
echo $id;
$sql = "DELETE FROM users WHERE user_id='$id'";

if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
}
header("Location: Users.php");

?>