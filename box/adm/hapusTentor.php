<?php
require '../fungsi.php';
$id_tentor = $_GET["id_tentor"];
$query = "DELETE FROM tentor WHERE id ='$id_tentor'";
mysqli_query($conn, $query);
header("location: db_tentor.php");
?>