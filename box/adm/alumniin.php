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
$result = mysqli_query($conn,"SELECT * FROM alumni  ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if(isset($_POST["submit"])){
  $tgl = date('d-m-Y H:i:s');
  $tawar1 = $_POST["tawar1"];
  $kategori1 = $_POST["kategori1"];
  $tingkat1 = $_POST["tingkat1"];
  $tingkata1 = $_POST["tingkata1"];
  $tingkatb1 = $_POST["tingkatb1"];
  $tingkatc1 = $_POST["tingkatc1"];
  $harga1 = $_POST["harga1"];
  $tawar2 = $_POST["tawar2"];
  $kategori2 = $_POST["kategori2"];
  $tingkat2 = $_POST["tingkat2"];
  $tingkata2 = $_POST["tingkata2"];
  $tingkatb2 = $_POST["tingkatb2"];
  $tingkatc2 = $_POST["tingkatc2"];
  $harga2 = $_POST["harga2"];
  $tawar3 = $_POST["tawar3"];
  $kategori3 = $_POST["kategori3"];
  $tingkat3 = $_POST["tingkat3"];
  $tingkata3 = $_POST["tingkata3"];
  $tingkatb3 = $_POST["tingkatb3"];
  $tingkatc3 = $_POST["tingkatc3"];
  $harga3 = $_POST["harga3"];

  $query = "UPDATE alumni SET tgl='$tgl',tawar1='$tawar1', kategori1='$kategori1',tingkat1='$tingkat1', tingkata1='$tingkata1',tingkatb1='$tingkatb1', tingkatc1='$tingkatc1',harga1='$harga1',tawar2='$tawar2', kategori2='$kategori2',tingkat2='$tingkat2', tingkata2='$tingkata2',tingkatb2='$tingkatb2', tingkatc2='$tingkatc2',harga2='$harga2',tawar3='$tawar3', kategori3='$kategori3',tingkat3='$tingkat3', tingkata3='$tingkata3',tingkatb3='$tingkatb3', tingkatc3='$tingkatc3',harga3='$harga3'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah');
    document.location.href = 'alumniin.php';
    </script>";} 
    else {echo"<script>alert('Data gagal diubah');
    document.location.href = 'alumniin.php';
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
  min-height: 1900px;
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
              <center><h2>Ganti Penawaran ALUMNI</h2></center>
              <br>
                <form accept="" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="fg1">
                      <div class="form-group">
                        <label for="pdf1" class="control-label">Tahun penawaran 1</label>
                        <input type="text" name="tawar1" value="<?=$row["tawar1"];?>" class="form-control" id="pdf1" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf11" class="control-label">Kategori1</label>
                        <input type="text" name="kategori1" value="<?=$row["kategori1"];?>" class="form-control" id="pdf11" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf1" class="control-label">Spsifikasi_a1</label>
                        <input type="text" name="tingkat1" value="<?=$row["tingkat1"];?>" class="form-control" id="pdf1" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf11" class="control-label">Spsifikasi_b1</label>
                        <input type="text" name="tingkata1" value="<?=$row["tingkata1"];?>" class="form-control" id="pdf11" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf1" class="control-label">Spsifikasi_c1</label>
                        <input type="text" name="tingkatb1" value="<?=$row["tingkatb1"];?>" class="form-control" id="pdf1" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf11" class="control-label">Spsifikasi_d1</label>
                        <input type="text" name="tingkatc1" value="<?=$row["tingkatc1"];?>" class="form-control" id="pdf11" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf1" class="control-label">harga1</label>
                        <input type="text" name="harga1" value="<?=$row["harga1"];?>" class="form-control" id="pdf1" autocomplete="off">
                      </div>
                    </div>  
                  </div>
                  <div class="col-md-6">
                    <div class="fg1">
                      <div class="form-group">
                        <label for="pdf2" class="control-label">Tahun penawaran 2</label>
                        <input type="text" name="tawar2" value="<?=$row["tawar2"];?>" class="form-control" id="pdf2" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf22" class="control-label">Kategori2</label>
                        <input type="text" name="kategori2" value="<?=$row["kategori2"];?>" class="form-control" id="pdf22" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf2" class="control-label">Spsifikasi_a2</label>
                        <input type="text" name="tingkat2" value="<?=$row["tingkat2"];?>" class="form-control" id="pdf2" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf22" class="control-label">Spsifikasi_b2</label>
                        <input type="text" name="tingkata2" value="<?=$row["tingkata2"];?>" class="form-control" id="pdf22" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf2" class="control-label">Spsifikasi_c2</label>
                        <input type="text" name="tingkatb2" value="<?=$row["tingkatb2"];?>" class="form-control" id="pdf2" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf22" class="control-label">Spsifikasi_d2</label>
                        <input type="text" name="tingkatc2" value="<?=$row["tingkatc2"];?>" class="form-control" id="pdf22" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf2" class="control-label">harga2</label>
                        <input type="text" name="harga2" value="<?=$row["harga2"];?>" class="form-control" id="pdf2" autocomplete="off">
                      </div>
                    </div>  
                  </div>
                </div>
              <br>
                <div class="row">
                  <div class="col-md-6 offset-md-3">
                    <div class="fg1">
                      <div class="form-group">
                        <label for="pdf3" class="control-label">Tahun penawaran 3</label>
                        <input type="text" name="tawar3" value="<?=$row["tawar3"];?>" class="form-control" id="pdf3" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf33" class="control-label">Kategori3</label>
                        <input type="text" name="kategori3" value="<?=$row["kategori3"];?>" class="form-control" id="pdf33" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf3" class="control-label">Spsifikasi_a3</label>
                        <input type="text" name="tingkat3" value="<?=$row["tingkat3"];?>" class="form-control" id="pdf3" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf33" class="control-label">Spsifikasi_b3</label>
                        <input type="text" name="tingkata3" value="<?=$row["tingkata3"];?>" class="form-control" id="pdf33" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf3" class="control-label">Spsifikasi_c3</label>
                        <input type="text" name="tingkatb3" value="<?=$row["tingkatb3"];?>" class="form-control" id="pdf3" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf33" class="control-label">Spsifikasi_d3</label>
                        <input type="text" name="tingkatc3" value="<?=$row["tingkatc3"];?>" class="form-control" id="pdf33" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="pdf3" class="control-label">harga3</label>
                        <input type="text" name="harga3" value="<?=$row["harga3"];?>" class="form-control" id="pdf3" autocomplete="off">
                      </div>
                    </div>  
                  </div>
                <center><input type="submit" name="submit" class="btn btn-outline-dark mt-3" value="Kirim"/></center>
              </form>
          </section>
           <section class="d-none d-md-block">
          <span style="font-weight: bolt; color: red; font-size: 20px;" class="mt-2">Catatan</span><br>
          <span>Panjang JUDUL max 200 karakter</span><br>
          <span>Panjang LINK max 255 karakter</span>
        </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
        </div>
</div>
  <?php
   include("../footer.php");
  ?>
</body>
</html> 