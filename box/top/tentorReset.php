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
$id_tentor=$_GET["id_tentor"];
$result=mysqli_query($conn, "SELECT * FROM tentor WHERE id = $id_tentor");
$row=mysqli_fetch_assoc($result);
$user=t.$id_tentor;
$foto=$row["foto"];
$pass = password_hash($user, PASSWORD_DEFAULT);
$level = '3';
$top = '';
$id_siswa= '';
$id_admin = '';
$status='Pasif';

$res=mysqli_query($conn, "SELECT * FROM user WHERE id_tentor = $id_tentor");
if (mysqli_fetch_assoc($res)){
$query = "UPDATE user SET tgl = '$tgl', user = '$user', pass = '$pass', status='$status' WHERE id_tentor = '$id_tentor'";
 mysqli_query($conn, $query);
 $query1 = "UPDATE tentor SET status='$status' WHERE id = '$id_tentor'";
 mysqli_query($conn, $query1);
 header("Location: tentorDb.php");
}else{$query = "INSERT INTO user VALUES ('','$tgl','$id_admin','$id_tentor','$id_siswa','$user','$pass','$level','$status','$foto')";
mysqli_query($conn, $query);
 $query1 = "UPDATE tentor SET code ='$user',status='$status' WHERE id = '$id_tentor'";
 mysqli_query($conn, $query1);
header("Location: tentorDb.php");
}


?>
