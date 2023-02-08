<?php
require '../../fungsi.php';
$id_rating = $_GET["id_rating"];
$query = "DELETE FROM rating WHERE id_rating ='$id_rating'";
mysqli_query($conn, $query);
header("location: rating.php");
?>