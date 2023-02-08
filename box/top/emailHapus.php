<?php
require '../../fungsi.php';
$id_email = $_GET["id_email"];
$query = "DELETE FROM email WHERE id_email ='$id_email'";
mysqli_query($conn, $query);
header("location: email.php");
?>