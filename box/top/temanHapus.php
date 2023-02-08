<?php
require '../../fungsi.php';
$id_teman = $_GET["id_teman"];
$query = "DELETE FROM teman WHERE id_teman ='$id_teman'";
mysqli_query($conn, $query);
header("location: email.php");
?>