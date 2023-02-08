<?php
require '../../fungsi.php';
$id_tentor=$_GET["id_tentor"];

$result=mysqli_query($conn, "SELECT status FROM tentor WHERE id = $id_tentor");
$row=mysqli_fetch_assoc($result);
$status = $row["status"];

if ($status == "Aktif"){
	$query = "UPDATE tentor SET  status='Pasif' WHERE id = '$id_tentor'";
        mysqli_query($conn, $query);
    $query1 = "UPDATE user SET  status='Pasif' WHERE id_tentor = '$id_tentor'";
        mysqli_query($conn, $query1);
        header("Location:tentorDb.php");
  exit;
}else{$query = "UPDATE tentor SET  status='Aktif' WHERE id = '$id_tentor'";
        mysqli_query($conn, $query);
        $query1 = "UPDATE user SET  status='Aktif' WHERE id_tentor = '$id_tentor'";
        mysqli_query($conn, $query1);
         header("Location:tentorDb.php");
  exit;
    }
?>