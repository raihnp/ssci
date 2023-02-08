<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
if($_SESSION["level"]!=='2'){
  header("Location:../login.php");
  exit;
}
$id_siswa=$_GET["id_siswa"];

$result=mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id_siswa");
$row=mysqli_fetch_assoc($result);

        $query = "UPDATE siswa SET  baru =' ' WHERE id = '$id_siswa'";
        mysqli_query($conn, $query);
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil dirubah');
    document.location.href = 'siswaDb.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal dirubah');
    document.location.href = 'siswaDb.php';
    </script>";}
?>
