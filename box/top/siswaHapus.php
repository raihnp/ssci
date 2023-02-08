<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../../index.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
if($_SESSION["level"]!=='1'){
  header("Location:../../index.php");
  exit;
}
$id_siswa=$_GET["id_siswa"];
$query = "DELETE FROM siswa WHERE id ='$id_siswa'";
mysqli_query($conn, $query);
header("location: siswaDb.php");
?>