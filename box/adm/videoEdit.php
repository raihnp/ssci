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
$id_video=$_GET["id_video"];

$result=mysqli_query($conn, "SELECT * FROM video WHERE id = $id_video");
$row=mysqli_fetch_assoc($result);


if(isset($_POST["submit"])){
  $tgl = date('d-m-Y H:i:s');
  $judul = $_POST["judul"];
  $link = $_POST["link"];
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
         $move = move_uploaded_file($foto_tmp, '../../img/video/'.$filefotoBaru);
          if($move){
            if (unlink('../../img/video/'.$fotolama))
            { "Deleted ../../img/video/$fotolama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=videoDb.php'>";
            } $foto =$filefotoBaru;
          }else{echo"<script>
                      alert(' Gagal uploud foto');
                      document.location.href = 'videoDb.php';
                      </script>";}
        }else{echo"<script>
                    alert('Gagal uploud foto ... Ukuran FOTO max 500 kb');
                    document.location.href = 'videoDb.php'; 
                    </script>";}
      }else{echo"<script>
                  alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                  document.location.href = 'tentorDb.php';
                  </script>";}
      } 
        $query = "UPDATE video SET  tgl='$tgl',judul='$judul',link='$link',foto='$foto' WHERE id = '$id_video'";
        mysqli_query($conn, $query);
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil dirubah');
    document.location.href = 'videoDb.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal dirubah');
    document.location.href = 'videoDb.php';
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
        <h3>Video Kita</h3>
        <hr>
        <form method="POST" action="" enctype="multipart/form-data">
              <div class="form-group">
                 <label class="control-label">Judul</label>
                 <input type="text" class="form-control"  name="judul" value="<?=$row["judul"];?>">
              </div>
              <div class="form-group">
                 <label class="control-label">Link</label>
                 <input type="text" class="form-control"  name="link" value="<?=$row["link"];?>">
              </div>
        <div class="form-group">
           <label for="filefoto" class="control-label">Foto Lama : </label><img src="../../img/video/<?=$row["foto"]; ?>" width = "200px">
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
