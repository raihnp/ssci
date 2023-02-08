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
$id_tentor=$_GET["id_tentor"];

$result=mysqli_query($conn, "SELECT * FROM tentor WHERE id = $id_tentor");
$row=mysqli_fetch_assoc($result);


if(isset($_POST["submit"])){
  $tgl= $_POST["tgl"];
  $lengkap = $_POST["lengkap"];
  $code = $_POST["code"];
  $panggilan = $_POST["panggilan"];
  $pelajaran = $_POST["pelajaran"];
  $lulusan = $_POST["lulusan"];
  $fotolama = $_POST["fotolama"];
     if($_FILES['filefoto']['error']===4) {
    $foto = $fotolama;
  }else{
  $filefoto = $_FILES["filefoto"]["name"];
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $filefoto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['filefoto']['size'];
      $foto_tmp = $_FILES['filefoto']['tmp_name'];  
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 500000){
         $filefotoBaru = uniqid();
          $filefotoBaru .= '.';
          $filefotoBaru .= $ekstensi;
         $move = move_uploaded_file($foto_tmp, '../../img/tentor/'.$filefotoBaru);
          if($move){
            if (unlink('../../img/tentor/'.$fotolama))
            { "Deleted ../../img/tentor/$fotolama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=tentorDb.php'>";
            } $foto =$filefotoBaru;
          }else{echo"<script>
                      alert(' Gagal uploud foto');
                      document.location.href = 'tentorDb.php';
                      </script>"; return false;}
        }else{echo"<script>
                    alert('Gagal uploud foto ... Ukuran FOTO max 500 kb');
                    document.location.href = 'tentorDb.php'; 
                    </script>";return false;}
      }else{echo"<script>
                  alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                  document.location.href = 'tentorDb.php';
                  </script>";return false;}
      } 
        $query = "UPDATE tentor SET  code='$code',tgl='$tgl',lengkap='$lengkap',panggilan='$panggilan',pelajaran='$pelajaran',lulusan='$lulusan',foto='$foto' WHERE id = '$id_tentor'";
        mysqli_query($conn, $query);
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil dirubah');
    document.location.href = 'tentorDb.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal dirubah');
    document.location.href = 'tentorDb.php';
    </script>";}
  }
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
  min-height: 1200px;
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
<section>
  <div class="container mt-3">
    <center class="h">
      <img src="../../img/ssci.png" width="200px" />
        <h2>FORM Edit</h2>
    </center>
    <br>
        <h3>Tentor</h3>
        <hr>
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                 <label class="control-label">Terdaftar</label>
                 <input type="text" class="form-control"  name="tgl" value="<?=$row["tgl"];?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                 <label class="control-label">Nama Lengkap</label>
                 <input type="text" class="form-control"  name="lengkap" value="<?=$row["lengkap"];?>">
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                 <label class="control-label">id Tentor</label>
                 <input type="text" class="form-control" name="code" value="t<?=$row["id"];?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Panggilan</label>
                 <input type="text" class="form-control" name="panggilan" value="<?=$row["panggilan"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Pelajaran</label>
                 <input type="text" class="form-control" name="pelajaran" value="<?=$row["pelajaran"];?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Lulusan</label>
                 <input type="text" class="form-control" name="lulusan" value="<?=$row["lulusan"];?>">
              </div>
            </div>
          </div>
        <div class="form-group">
           <label for="filefoto" class="control-label">Foto Lama : </label><img src="../../img/tentor/<?=$row["foto"]; ?>" width = "50px">
           <input type="file" name="filefoto" value="" class="form-control" id="filefoto">
            <input type="hidden" name="fotolama" value="<?=$row["foto"]; ?>">
        </div>

  <br>
  <center>
     <input type="submit" name="submit" class="btn btn-outline-dark" value="Ubah"/>
  </center>
</form>
</section>
  </div>
</div>
</body>
</html>
