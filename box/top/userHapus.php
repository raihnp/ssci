<?php
require '../../fungsi.php';
$id = $_GET["id"];
$query = "DELETE FROM user WHERE id ='$id'";
mysqli_query($conn, $query);
header("location: user.php");
?>