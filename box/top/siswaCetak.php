<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../../index.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y');
$tgl = date('d-M-Y');
$jam = date('H:i:s');
$id = $_SESSION["id"];
if($_SESSION["level"]!=='1'){
  header("Location:../../index.php");
  exit;
}
$id_siswa=$_GET["id_siswa"];
$sql=mysqli_query($conn,"SELECT * FROM siswa WHERE id = $id_siswa");
$row = mysqli_fetch_assoc($sql);
$pin = $row["pin"];

$sql=mysqli_query($conn,"SELECT * FROM absensi WHERE pin = $pin ORDER BY id DESC");



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
	<title></title>
  <style>
body{
  background-color: #aed768;
}
.h4 {
  color: black;
}
</style>
  </style>
</head>
<body>
<div>
  <div class="container">
    <div class="row"> 
      <div class="col-md-2">
        <img src="../../img/ssci.png" width="150px" align="right">
      </div>
      <div class="col-md-4 mt-3">
        <b>SSCIntersolusi Yogyakarta | KANTOR PUSAT</b><br>Jl. Sunaryo 14 Kotabaru, Yogyakarta<br>Telp. (0274) 560466 WA : 0823 2319 8585<br>www.ssci.co.id
      </div>
    </div>
    <hr style="border: 2px solid black">

<div class="row">
  <div class="col-md-4 offset-md-8">
Kepada yth
Bapak/Ibu <b><?=$row["ortu"];?></b><br>
orang tua siswa dari <b><?=$row["nama"];?></b><br>
<i><?=$row["alamatortu"];?></i>
</div>
</div>
<br>

Dengan hormat,
berhubung dengan kegiatan belajar mengajar putra/putri bapak/ibu di SSCIntersolusi.   Kami informasikan tentang kehadirannya hingga jam <?=$jam;?> tanggal <?=$tgl;?> adalah;
<br>
<table class="table">
          <tr>
            <th>No</th>
            <th>Tanggal | Jam</th>
            <th>Pelajaran</th>
            <th>Tentor</th>
         </tr>
         <?php $s=1; ?>
         <?php while($sq = mysqli_fetch_assoc($sql)) : ?>
         <tr>
           <td><?= $s; ?></td>
           <td><?=$sq["tanggal"];?> | <?=$sq["jam"];?></td>
           <td><?=$sq["pelajaran"];?></td>
           <td><?=$sq["tentor"];?></td>
         </tr>
         <?php $s++; ?>
         <?php endwhile; ?>
</table>
<br>
<br>
Jumlah pertemuan siswa hingga <?=$tgl;?> adalah 13 kali,
<br>
Jumlah kehadiran siswa adalah 13 kali,
<br>
Prosentase kehadiran siswa adalah <b>100%</b>
<br>
<br>

Apabila laporan ini terdapat kekeliruan, bapak/ibu dapat menghubungi bagian akademik SSCIntersolusi.
<br>

Atas perhatiannya kami ucapkan terimakasih.
<br>
<br>

Yogyakarta, <?=$tgl;?>
<br>
Ytd
<br>
<br>
<br>
<br>
<br>
M Salimi Spd <br>
Office Manager


  </div>
</div>
</body>
</html>
