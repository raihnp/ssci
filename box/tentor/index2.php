<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}

require '../../fungsi.php';
$tgl = date('d-m-Y H:i:s');
$tanggal = date('d-m-Y');
$jam = date('H:i:s');
$t = date('M-Y'); 
$id = $_SESSION["id"];
$qrcode=$_POST["text"];

$sql=mysqli_query($conn,"SELECT * FROM qr WHERE code = '$qrcode'");
$row = mysqli_fetch_assoc($sql);
$pelajaran = $row["text"];
$tentor = $row["tentor"];

$sql1=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$row1 = mysqli_fetch_assoc($sql1);
$id_siswa=$row1["id_siswa"];

$sql2=mysqli_query($conn,"SELECT * FROM siswa WHERE id_siswa = $id_siswa");
$row2 = mysqli_fetch_assoc($sql2);
$nama = $row2["nama"];
$pin = $row2["pin"];

$sql3=mysqli_query($conn,"SELECT * FROM absensi WHERE pin = $pin AND tanggal = '$tanggal' AND pelajaran = '$pelajaran'");
$row3 = mysqli_fetch_assoc($sql3);
$id_absensi = $row3["id"];
$qrc = $row3["qrcode"];


if($qrcode == $qrc){$query = "UPDATE absensi SET jam = '$jam' WHERE id = $id_absensi";
 mysqli_query($conn, $query);}
 else{
 $query = "INSERT INTO absensi VALUES ('','$pin','$nama','$tanggal','$jam','$pelajaran','$tentor','$qrcode')";
 mysqli_query($conn, $query);
 }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<center>
	<h2>Nama : <?=$nama;?></h2> <br>
	<h1 style="color: green">ANDA SUDAH ABSENSI</h1><br>
	<h2>Tanggal  Jam  : <?=$tgl;?> <br>
	Pelajaran : <?=$pelajaran;?> <br>
	Mentor : <?=$tentor;?></h2>
	<br>
	<br>
	<button><a href="../login.php">OKE</a></button>
	
</center>
</body>
</html>
