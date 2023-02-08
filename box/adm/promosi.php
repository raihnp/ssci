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

$result = mysqli_query($conn,"SELECT * FROM promosi  ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);


if(isset($_POST["submit"])){
  $tgl = date('d-m-Y H:i:s'); 

$foto1lama = $_POST["foto1lama"];
     if($_FILES['filefoto1']['error']===4) {
    $foto1 = $foto1lama;
  }else{
  $filefoto1 = $_FILES["filefoto1"]["name"];
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $filefoto1);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['filefoto1']['size'];
      $foto1_tmp = $_FILES['filefoto1']['tmp_name'];  
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 500000){
         $filefoto1Baru = uniqid();
          $filefoto1Baru .= '.';
          $filefoto1Baru .= $ekstensi;
         $move = move_uploaded_file($foto1_tmp, '../../img/promosi/'.$filefoto1Baru);
          if($move){
            if (unlink('../../img/promosi/'.$foto1lama))
            { "Deleted ../../img/promosi/$foto1lama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=promosi.php'>";
            } $foto1 =$filefoto1Baru;
          }else{echo"<script>
                      alert(' Gagal uploud foto1');
                      document.location.href = 'promosi.php';
                      </script>";}
        }else{echo"<script>
                    alert('Gagal uploud foto1 ... Ukuran foto1 max 500 kb');
                    document.location.href = 'promosi.php'; 
                    </script>";}
      }else{echo"<script>
                  alert('Gagal uploud foto1 ... Ekstensi foto1 yang diperbolehkan png dan jpg');
                  document.location.href = 'promosi.php';
                  </script>";}
      } 

$foto2lama = $_POST["foto2lama"];
     if($_FILES['filefoto2']['error']===4) {
    $foto2 = $foto2lama;
  }else{
  $filefoto2 = $_FILES["filefoto2"]["name"];
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $filefoto2);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['filefoto2']['size'];
      $foto2_tmp = $_FILES['filefoto2']['tmp_name'];  
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 500000){
         $filefoto2Baru = uniqid();
          $filefoto2Baru .= '.';
          $filefoto2Baru .= $ekstensi;
         $move = move_uploaded_file($foto2_tmp, '../../img/promosi/'.$filefoto2Baru);
          if($move){
            if (unlink('../../img/promosi/'.$foto2lama))
            { "Deleted ../../img/promosi/$foto2lama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=promosi.php'>";
            } $foto2 =$filefoto2Baru;
          }else{echo"<script>
                      alert(' Gagal uploud foto2');
                      document.location.href = 'promosi.php';
                      </script>";}
        }else{echo"<script>
                    alert('Gagal uploud foto2 ... Ukuran foto2 max 500 kb');
                    document.location.href = 'promosi.php'; 
                    </script>";}
      }else{echo"<script>
                  alert('Gagal uploud foto2 ... Ekstensi foto2 yang diperbolehkan png dan jpg');
                  document.location.href = 'promosi.php';
                  </script>";}
      } 


$foto3lama = $_POST["foto3lama"];
     if($_FILES['filefoto3']['error']===4) {
    $foto3 = $foto3lama;
  }else{
  $filefoto3 = $_FILES["filefoto3"]["name"];
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $filefoto3);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['filefoto3']['size'];
      $foto3_tmp = $_FILES['filefoto3']['tmp_name'];  
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 500000){
         $filefoto3Baru = uniqid();
          $filefoto3Baru .= '.';
          $filefoto3Baru .= $ekstensi;
         $move = move_uploaded_file($foto3_tmp, '../../img/promosi/'.$filefoto3Baru);
          if($move){
            if (unlink('../../img/promosi/'.$foto3lama))
            { "Deleted ../../img/promosi/$foto3lama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=promosi.php'>";
            } $foto3 =$filefoto3Baru;
          }else{echo"<script>
                      alert(' Gagal uploud foto3');
                      document.location.href = 'promosi.php';
                      </script>";}
        }else{echo"<script>
                    alert('Gagal uploud foto3 ... Ukuran foto3 max 500 kb');
                    document.location.href = 'promosi.php'; 
                    </script>";}
      }else{echo"<script>
                  alert('Gagal uploud foto3 ... Ekstensi foto3 yang diperbolehkan png dan jpg');
                  document.location.href = 'promosi.php';
                  </script>";}
      } 


$foto4lama = $_POST["foto4lama"];
     if($_FILES['filefoto4']['error']===4) {
    $foto4 = $foto4lama;
  }else{
  $filefoto4 = $_FILES["filefoto4"]["name"];
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $filefoto4);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['filefoto4']['size'];
      $foto4_tmp = $_FILES['filefoto4']['tmp_name'];  
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 500000){
         $filefoto4Baru = uniqid();
          $filefoto4Baru .= '.';
          $filefoto4Baru .= $ekstensi;
         $move = move_uploaded_file($foto4_tmp, '../../img/promosi/'.$filefoto4Baru);
          if($move){
            if (unlink('../../img/promosi/'.$foto4lama))
            { "Deleted ../../img/promosi/$foto4lama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=promosi.php'>";
            } $foto4 =$filefoto4Baru;
          }else{echo"<script>
                      alert(' Gagal uploud foto4');
                      document.location.href = 'promosi.php';
                      </script>";}
        }else{echo"<script>
                    alert('Gagal uploud foto4 ... Ukuran foto4 max 500 kb');
                    document.location.href = 'promosi.php'; 
                    </script>";}
      }else{echo"<script>
                  alert('Gagal uploud foto4 ... Ekstensi foto2 yang diperbolehkan png dan jpg');
                  document.location.href = 'promosi.php';
                  </script>";}
      } 



    $query = "UPDATE promosi SET foto1='$foto1',foto2='$foto2',foto3='$foto3',foto4='$foto4'";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah');
    document.location.href = 'promosi.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal diubah');
    document.location.href = 'promosi.php';
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
  min-height: 2300px;
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
      <center><h2>Ganti Promosi</h2></center>
      <br>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
          <div class="col-md-1">
              <label for="gambar1" class="control-label">Promosi SD</label>
          </div>
              <div class="col-md-3">
           <label for="filefoto1" class="control-label">foto1 Lama : </label><img src="../../img/promosi/<?=$row["foto1"]; ?>" width = "150px">
         </div>
       <div class="col-md-8">
            <label for="gambar1" class="control-label">Ganti</label>
           <input type="file" name="filefoto1" value="" class="form-control" id="gambar1">
            <input type="hidden" name="foto1lama" value="<?=$row["foto1"]; ?>">
        </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-1">
              <label for="gambar2" class="control-label">Promosi SMP</label>
          </div>
              <div class="col-md-3">
           <label for="filefoto2" class="control-label">foto2 Lama : </label><img src="../../img/promosi/<?=$row["foto2"]; ?>" width = "150px">
         </div>
       <div class="col-md-8">
            <label for="gambar1" class="control-label">Ganti</label>
           <input type="file" name="filefoto2" value="" class="form-control" id="gambar1">
            <input type="hidden" name="foto2lama" value="<?=$row["foto2"]; ?>">
      </div>
      <hr>
      <div class="row">
          <div class="col-md-1">
              <label for="gambar3" class="control-label">Image SMA</label>
          </div>
              <div class="col-md-3">
           <label for="filefoto3" class="control-label">foto3 Lama : </label><img src="../../img/promosi/<?=$row["foto3"]; ?>" width = "150px">
         </div>
       <div class="col-md-8">
            <label for="gambar1" class="control-label">Ganti</label>
           <input type="file" name="filefoto3" value="" class="form-control" id="gambar1">
            <input type="hidden" name="foto3lama" value="<?=$row["foto3"]; ?>">
        </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-1">
              <label for="gambar4" class="control-label">Image ALUMNI</label>
          </div>
              <div class="col-md-3">
           <label for="filefoto4" class="control-label">foto4 Lama : </label><img src="../../img/promosi/<?=$row["foto4"]; ?>" width = "150px">
         </div>
       <div class="col-md-8">
            <label for="gambar1" class="control-label">Ganti</label>
           <input type="file" name="filefoto4" value="" class="form-control" id="gambar1">
            <input type="hidden" name="foto4lama" value="<?=$row["foto4"]; ?>">
        </div>
      </div>

      <center><input type="submit" name="submit" class="btn btn-outline-dark mt-3" value="Kirim"/></center>
    </form>
  </section>
   <section class="d-none d-md-block">
             <span style="font-weight: bolt; color: red; font-size: 20px;" class="mt-2">Catatan</span><br>
            <span>Ukuran IMAGE 1 : 1</span>
          </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
  </div>
</div>
      <?php
       include("../footer.php");
      ?>
</body>
</html> 