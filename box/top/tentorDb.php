<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;}
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

$halamanAktif = isset($_GET["halaman"])?($_GET["halaman"]) : $halaman=1;
$halaman = 10;
$mulai = ($halamanAktif - 1) * $halaman;
$no = $mulai + 1;
if(isset($_POST["search"])) {
      $keyword =$_POST["keyword"];
      $sql = mysqli_query($conn, "SELECT * FROM tentor WHERE  code LIKE '%$keyword%' OR lengkap LIKE '%$keyword%' OR pelajaran LIKE '%$keyword%' ORDER BY id asc");
      $sql2 = mysqli_num_rows($sql);
      $sq= mysqli_query($conn, "SELECT * FROM tentor");
      $sql3 = mysqli_num_rows($sq);
      $no = 1;
  }else{
      $sql = mysqli_query($conn, "SELECT * FROM tentor ORDER BY id asc LIMIT $mulai,$halaman"); 
      $sql2 = mysqli_num_rows($sql);
      $sq= mysqli_query($conn, "SELECT * FROM tentor");
      $sql3 = mysqli_num_rows($sq);   
    }
    $akhir = ceil($sql3/$halaman);

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
       <div class="card-header">
      <span style="font-size: 20px">Database Tentor</span>
        <span class="hidden float-right"></span> 
      <span class="float-end">
        <form action="" method="POST">
               <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Pencarian..." name="keyword" autocomplete="off">
                    <button class="btn btn-outline-primary btn-sm" type="submit" name="search">SEARCH</button>
                    <a href="?halaman=<?= $i=1; ?>" class="btn btn-outline-warning btn-sm">RESET</a>
                </div>    
          </form>
        </span>
      </div>
          <table class="table table-hover" style="margin-bottom: 100px;">
            <tr>
              <th>No</th>
              <th>Tentor</th>
              <th>Foto Tentor</th>
              <th>Aksi</th>
            </tr>
            <?php $si =1;?>
            <?php
            while($row=mysqli_fetch_assoc($sql)):
            ?>
            <tr>
              <td><?=$no;?></td>
             <td>Code&nbsp;&nbsp;&nbsp;:&nbsp; t<?=$row["id"];?><br>
                  Nama&nbsp;&nbsp;&nbsp;:&nbsp;<?=$row["lengkap"];?><br>
                  Panggilan&nbsp;:&nbsp;<?=$row["panggilan"];?><br>
                  Pelajaran&nbsp;&nbsp;:&nbsp;<?=$row["pelajaran"];?><br>
                  Lulusan&nbsp;&nbsp;:&nbsp;<?=$row["lulusan"];?><br>
                  Terdaftar&nbsp;&nbsp;:&nbsp;<?=$row["tgl"];?>
              <td><img src="../../img/tentor/<?=$row["foto"];?>" width="100px"></td>
              <td class="d-none d-md-block">
                  <a href="tentorEdit.php?id_tentor=<?=$row["id"];?>">Edit</a><br>
                  <a href="tentorHapust.php?id_tentor=<?=$row["id"];?>" onclick = "return confirm('yakin ?');">Hapus</a><br>
                  <a href="tentorStatus.php?id_tentor=<?=$row["id"];?>" onclick = "return confirm('yakin ?');"><?=$row["status"];?><a><br>
                  <a href="tentorReset.php?id_tentor=<?=$row["id"];?>" onclick = "return confirm('yakin ?');">Reset</a>
                </td>
            </tr>
           <?php $no++;?>
         <?php endwhile; ?>
</table>
<p style="margin: 0px"><i>Tampil <b><?= $sql2; ?></b> dari <b><?= $sql3; ?></b></i></p>
                <ul style="margin-bottom: 30px;" class="pagination">
                <?php if($halamanAktif>1): ?>
                  <li><a href="?halaman=<?=$i=1; ?>">First</a></li>&nbsp;
                  <li><a href="?halaman=<?=$halamanAktif - 1; ?>">&laquo;</a> </li>&nbsp;
                <?php endif; ?>     
                <?php $jumlah_number = 2;
                $start_number = ($halamanAktif > $jumlah_number)? $halamanAktif - $jumlah_number : 1;
                $end_number = ($halamanAktif < ($akhir - $jumlah_number))? $halamanAktif + $jumlah_number : $akhir; 
                ?>
                  <?php $mulai = $halamanAktif-2; ?>
                  <?php  for ($i=$start_number; $i <=$end_number  ; $i++) : ?>
                  <?php if($i == $halamanAktif): ?>
                  <li><a href="?halaman=<?= $i; ?>"style="font-weight:bold; color: red" ><?= $i; ?></a></li>&nbsp;
                  <?php else: ?>
                  <li><a href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>&nbsp;
                  <?php endif; ?>
                  <?php endfor; ?>
                <?php if($halamanAktif<$akhir): ?>
                  <li><a href="?halaman=<?=$halamanAktif + 1; ?>">&raquo;</a></li>&nbsp;
                  <li><a href="?halaman=<?=$i=$akhir; ?>">Last</a></li>
                <?php endif; ?>     
            </ul>
      </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    </div>
  </div>
  <?php
   include("../footer.php");
  ?>
</body>
</html>
