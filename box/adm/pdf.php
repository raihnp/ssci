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
$result=mysqli_query($conn, "SELECT * FROM siswa");

$result = mysqli_query($conn,"SELECT * FROM pdf  ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if(isset($_POST["submit"])){
  $tgl = date('d-m-Y H:i:s');
  $judul1 = $_POST["judul1"];
  $link1 = $_POST["link1"];
  $judul2 = $_POST["judul2"];
  $link2 = $_POST["link2"];
  $judul3 = $_POST["judul3"];
  $link3 = $_POST["link3"];
  $judul4 = $_POST["judul4"];
  $link4 = $_POST["link4"];
  $judul5 = $_POST["judul5"];
  $link5 = $_POST["link5"];
  $judul6 = $_POST["judul6"];
  $link6 = $_POST["link6"];


  $query = "UPDATE pdf SET tgl='$tgl',judul1='$judul1', link1='$link1',judul2='$judul2', link2='$link2',judul3='$judul3', link3='$link3',judul4='$judul4', link4='$link4',judul5='$judul5', link5='$link5',judul6='$judul6', link6='$link6'";
   mysqli_query($conn, $query);

    // $query = "INSERT INTO pdf VALUES ('','$tgl','$judul1','$link1','$judul2','$link2','$judul3','$link3','$judul4','$link4','$judul5','$link5','$judul6','$link6')";
    // mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah');
    document.location.href = 'pdf.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal diubah');
    document.location.href = 'pdf.php';
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
      <center><h2>Ganti Pdf download</h2></center>
      <br>
        <form accept="" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="fg1">
              <div class="form-group">
                <label for="pdf1" class="control-label">Judul1</label>
                <input type="text" name="judul1" value="<?=$row["judul1"];?>" class="form-control" id="pdf1" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="pdf11" class="control-label">Link1</label>
                <input type="text" name="link1" value="<?=$row["link1"];?>" class="form-control" id="pdf11" autocomplete="off">
              </div>
            </div>  
          </div>
          <div class="col-md-6">
            <div class="fg1">
              <div class="form-group">
                <label for="pdf2" class="control-label">Judul2</label>
                <input type="text" name="judul2" value="<?=$row["judul2"];?>" class="form-control" id="pdf2" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="pdf22" class="control-label">Link2</label>
                <input type="text" name="link2" value="<?=$row["link2"];?>" class="form-control" id="pdf22" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="fg1">
              <div class="form-group">
                <label for="pdf3" class="control-label">Judul3</label>
                <input type="text" name="judul3" value="<?=$row["judul3"];?>" class="form-control" id="pdf3" autocomplete="off">
              </div>
             <div class="form-group">
               <label for="pdf33" class="control-label">Link3</label>
               <input type="text" name="link3" value="<?=$row["link3"];?>" class="form-control" id="pdf33" autocomplete="off">
             </div>
            </div>  
          </div>
          <div class="col-md-6">
            <div class="fg1">
              <div class="form-group">
               <label for="pdf4" class="control-label">Judul4</label>
               <input type="text" name="judul4" value="<?=$row["judul4"];?>" class="form-control" id="pdf4" autocomplete="off">
              </div>
              <div class="form-group">
               <label for="pdf44" class="control-label">Link4</label>
               <input type="text" name="link4" value="<?=$row["link4"];?>" class="form-control" id="pdf44" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="fg1">
              <div class="form-group">
                <label for="pdf5" class="control-label">Judul5</label>
                <input type="text" name="judul5" value="<?=$row["judul5"];?>" class="form-control" id="pdf5" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="pdf55" class="control-label">Link5</label>
                <input type="text" name="link5" value="<?=$row["link5"];?>" class="form-control" id="pdf55" autocomplete="off">
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="fg1">
              <div class="form-group">
                <label for="pdf6" class="control-label">Judul6</label>
                <input type="text" name="judul6" value="<?=$row["judul6"];?>" class="form-control" id="pdf6" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="pdf66" class="control-label">Link6</label>
                <input type="text" name="link6" value="<?=$row["link6"];?>" class="form-control" id="pdf66" autocomplete="off">
              </div>
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