<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../../index.php");
  exit;}
if($_SESSION["level"]!=='1'){
  header("Location:../../index.php");
  exit;
}
require '../../fungsi.php';
$id_siswa=$_GET["id_siswa"];

$result=mysqli_query($conn, "SELECT status FROM siswa WHERE id = $id_siswa");
$row=mysqli_fetch_assoc($result);
$status = $row["status"];

if ($status == "Aktif"){
	$query = "UPDATE siswa SET  status='Pasif' WHERE id = '$id_siswa'";
        mysqli_query($conn, $query);
        $query1 = "UPDATE user SET  status='Pasif' WHERE id_siswa = '$id_siswa'";
        mysqli_query($conn, $query1);
        header("Location:siswaDb.php");
  exit;
}else{$query = "UPDATE siswa SET  status='Aktif' WHERE id = '$id_siswa'";
        mysqli_query($conn, $query);
        $query1 = "UPDATE user SET  status='Aktif' WHERE id_siswa = '$id_siswa'";
        mysqli_query($conn, $query1);
         header("Location:siswaDb.php");
  exit;
    }
?>