<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}
if($_SESSION["level"]!=='1'){
  header("Location:../login.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
$sql=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$rows = mysqli_fetch_assoc($sql);
$foto=$rows["foto"];
$nama = $rows["user"];

$result=mysqli_query($conn, "SELECT * FROM siswa WHERE baru = 'ok'");

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
  min-height: 1600px;
  }
  .tab {
      border: 2px solid black;
      padding: 5px;
    }
  .home{
      margin-top: -180px;
    }
    a {
      text-decoration: none;
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
      include("top_time.php");
      include("top_menu.php");
      include("top_animasi.php");
    ?>
  </div>
  <div class="col-md-10 mt-3">
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <section class="tab">
       <div class="header">
        <img src="../../img/tugus.jpg" width="100%">
       </div>
       <br>
      <h2>Siswa Baru</h2>
       <br>
          <table class="table table-hover" style="margin-bottom: 100px;">
            <tr>
              <th>No</th>
              <th>Siswa</th>
              <th>Waktu Pendaftaran</th>
              <th>Aksi</th>
            </tr>
            <?php $si =1;?>
            <?php
            while($row=mysqli_fetch_assoc($result)):
            ?>
            <tr>
              <td><?=$si;?></td>
              <td><a href="baruCetak.php?id_siswa=<?=$row["id"];?>"><?=$row["nama"];?></a></td>
              <td><?=$row["tgl"];?></td>
              <td>Moderasi</td>
            </tr>
            <?php $si++;?>
          <?php endwhile;?>
          </table>
      </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    </div>
  </div>
    <?php
   include("../footer.php");
  ?>
</body>
</html>
