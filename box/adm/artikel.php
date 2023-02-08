<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
$sql=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$rows = mysqli_fetch_assoc($sql);
$id_admin=$rows["id_admin"];
$sql1=mysqli_query($conn,"SELECT * FROM admin WHERE id_admin = $id_admin");
$rows1 = mysqli_fetch_assoc($sql1);
$foto=$rows1["foto"];
$nama = $rows1["nama"];
$result=mysqli_query($conn, "SELECT * FROM artikel ORDER BY id DESC");
$row = mysqli_fetch_assoc($result);

if(isset($_POST["submit"])){
  $tgl = date('d-m-Y H:i:s'); 
  $judul = $_POST["judul"];
  $subject = $_POST["subject"];
  $link = $_POST["link"];
  $fotolama = $_POST["fotolama"];
     if($_FILES['filefoto']['error']===4) {
      $foto = $fotolama;
      }else{
      $filefoto = $_FILES["filefoto"]["name"];
          $ekstensi_diperbolehkan = array('png','jpg','jpeg','bmp');
          $x = explode('.', $filefoto);
          $ekstensi = strtolower(end($x));
          $ukuran = $_FILES['filefoto']['size'];
          $foto_tmp = $_FILES['filefoto']['tmp_name'];  
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 2000000){
             $filefotoBaru = uniqid();
              $filefotoBaru .= '.';
              $filefotoBaru .= $ekstensi;
             $move = move_uploaded_file($foto_tmp, '../../img/artikel/'.$filefotoBaru);
              if($move){
                if (unlink('../../img/artikel/'.$fotolama))
                { "Deleted ../../img/artikel/$fotolama";
                  "<META HTTP-EQUIV=Refresh CONTENT='1; URL=artikel.php'>";
                } 
                $foto =$filefotoBaru;
              }else{echo"<script>
                          alert(' Gagal uploud foto');
                          document.location.href = 'login.php';
                          </script>"; return false;}
            }else{echo"<script>
                        alert('Gagal uploud foto ... Ukuran FOTO max 2Mb');
                        document.location.href = 'login.php'; 
                        </script>";return false;}
          }else{echo"<script>
                      alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                      document.location.href = 'login.php';
                      </script>";return false;}
}
 $query = "UPDATE artikel SET tgl='$tgl', judul='$judul', subject='$subject',  link='$link', foto='$foto'";
 mysqli_query($conn, $query);

 if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah');
    document.location.href = 'login.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal diubah');
    document.location.href = 'login.php';
    </script>";}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../styles.css" />
    <link rel="stylesheet" href="../../css/animasi.css">
    <link rel="stylesheet" href="../../css/animate.css">
	<title></title>
  <style>
  body{
  min-height: 1500px;
  }
  .tab {
      border: 2px solid black;
      padding: 5px;
    }
  .home{
      margin-top: -180px;
    }
  </style>
  <script type="text/javascript"> 
history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    </script>
</head>
<body>
<nav class="navbar fixed-top navbar-light">
      <a class="navbar-brand" href="#">
        <img src="../../img/ssci2.png" height="40">
        SSCIntersolusi
      </a>
    </nav>
    <div class="row">
      <div class="col-md-2 mt-3">
        <?php
            include("../time.php");
            include("../menu.php");
            include("../animasi.php");
        ?>
      </div>
      <div class="col-md-10 mt-3">
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
      <section  class="d-md-none">
        <center><h3>Open in PC</h3></center>
      </section>
      <section class="tab d-none d-md-block">
       <div class="header">
        <img src="../../img/tugus.jpg" width="100%">
       </div>
       <br>
        <center><h2>Ganti Artikel</h2></center>
        <br>
            <form action="" method="POST" enctype="multipart/form-data">
              
                  <div class="form-group">
                     <label for="subject" class="control-label">Judul</label>
                     <input type="text" name="judul" value="<?=$row["judul"];?>" class="form-control" id="subject" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label for="subject" class="control-label">Content</label>
                  </div>

                <div class="form-group">
                <textarea  name="subject" id="ket" class="form-control" rows="2" cols="100"><?=$row["subject"] ;?></textarea>
                </div>
                  <div class="form-group">
                     <label for="link" class="control-label">Link</label>
                     <input type="text" name="link" value="<?=$row["link"];?>" class="form-control" id="link" autocomplete="off">
                  </div>
                  <div class="row">
                  <div class="col-md-1">
                      <label for="gambar" class="control-label">Image</label>
                  </div>
                  <div class="col-md-3">
                      <label for="filefoto" class="control-label">Foto Lama : </label><img src="../../img/artikel/<?=$row["foto"]; ?>" width = "150px">
                  </div>
                  <div class="col-md-8">
                  <label for="gambar" class="control-label">Ganti</label>
                      <input type="file" name="filefoto" value="" class="form-control" id="gambar">
                      <input type="hidden" name="fotolama" value="<?=$row["foto"]; ?>">
                  </div>
                  </div>
            <center><input type="submit" name="submit" class="btn btn-outline-dark mt-3" value="Kirim"/></center>
          </form>
          </section>
      <section class="d-none d-md-block">
             <span style="font-weight: bolt; color: red; font-size: 20px;" class="mt-2">Catatan</span><br>
            <span>Panjang JUDUL max 50 karakter</span><br>
            <span>Panjang CONTENT max 200 karakter</span><br>
            <span>Panjang lINK max 100 karakter</span><br>
            <span>Ukuran IMAGE 2 : 1 </span>
          </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
     </div>
      </div>
      <?php
       include("../footer.php");
      ?>
</body>
</html>