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
$tgl = date('d-M-Y H:i:s');
$id_siswa=$_GET["id_siswa"];
$result=mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id_siswa");
$row=mysqli_fetch_assoc($result);
$user=$row["pin"];
$foto=$row["foto"];
$pass = password_hash($user, PASSWORD_DEFAULT);
$level = '4';
$id_tentor= '';
$id_admin = '';
$status='Pasif';

$res=mysqli_query($conn, "SELECT * FROM user WHERE id_siswa = $id_siswa");
if (mysqli_fetch_assoc($res)){
$query = "UPDATE user SET user = '$user', pass = '$pass', status='$status' WHERE id_siswa = '$id_siswa'";
 mysqli_query($conn, $query);
 $query1 = "UPDATE siswa SET status='$status' WHERE id = '$id_siswa'";
 mysqli_query($conn, $query1);
 header("Location: siswaDb.php");
}else
{$query = "INSERT INTO user VALUES ('','$tgl','$id_admin','$id_tentor','$id_siswa','$user','$pass','$level','$status','$foto')";
mysqli_query($conn, $query);
$query1 = "UPDATE siswa SET status='$status' WHERE id = '$id_siswa'";
 mysqli_query($conn, $query1);
header("Location: siswaDb.php");
exit;
}


?>

