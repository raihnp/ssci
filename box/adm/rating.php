<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}

require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
if($_SESSION["level"]!=='1'){
  header("Location:../login.php");
  exit;
}
$sql=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$rowsa = mysqli_fetch_assoc($sql);
$foto=$rowsa["foto"];
$nama = $rowsa["nama"];

$res= mysqli_query($conn, "SELECT AVG(rating) AS average FROM rating");
$rows = mysqli_fetch_assoc($res);
$average = $rows['average'];
$format = number_format($average,1);


$result=mysqli_query($conn, "SELECT * FROM rating ORDER BY id DESC");
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
        <div align="center" style="margin-top: 50px;">
            <a href="logout.php"><img src="../../img/admin/<?=$foto;?>" width="100"></a><br>
            <SCRIPT language=JavaScript>var d = new Date();
                        var h = d.getHours();
                        if (h < 10) { document.write('Selamat pagi,'); }
                        else { if (h < 15) { document.write('Selamat siang,'); }
                        else { if (h < 19) { document.write('Selamat sore,'); }
                        else { if (h <= 23) { document.write('Selamat malam,'); }
                        }}}
            </SCRIPT>
                <p class="text-center"><b><?=$nama;?></b></p>
        </div>
        <div class="menu-kiri">
          <div class="card" style="width: 100%;">
            <div class="card-header text-center">
                Top Admin
            </div>
                  <ul>
                    <li><a href="tabel.php">db_Siswa</a></li>
                    <li><a href="email.php">db_email</a></li>
                    <li><a href="teman.php">db_Rekomendasi</a></li>
                    <li><a href="rating.php">db_Rating</a></li>
                    <li><a href="user.php">db_User</a></li>
                    <li><a href="sdin.php">Ganti SD</a></li>
                    <li><a href="smpin.php">Ganti SMP</a></li>
                    <li><a href="smain.php">Ganti SMA</a></li>
                    <li><a href="alumniin.php">Ganti ALUMNI</a></li>
                    <li><a href="privatin.php">Ganti PRIVAT</a></li>
                    <li><a href="artikel.php">gArtikel</a></li>
                    <li><a href="videoKita.php">gVideo kita</a></li>
                    <li><a href="promosi.php">gPromo kita</a></li>
                    <li><a href="tentor.php">gTentor kita</a></li>
                    <li><a href="testi.php">gTestimoni</a></li>
                    <li><a href="vtesti.php">gVidio Testi</a></li>
                    <li><a href="pdf.php">gPdf</a></li>
                    <li><a href="index.php">Backup</a></li>
                </ul>
          </div>
        </div>
         <section>
        <div class="container">
                <div class="ani">
                  <div class="a1"><span><b></b></span></div>
                      <div class="a2"><span><b></b></span></div>
                      <div class="a3"><span><b></b></span></div>
                      <div class="a4"><span><b></b></span></div>
                      <div class="a5"><span><b></b></span></div>
                      <div class="a6"><span><b></b></span></div>
                      <div class="a7"><span><b></b></span></div>
                      <div class="a8"><span><b></b></span></div>
                      <div class="a9"><span><b></b></span></div>
                      <div class="a10"><span><b></b></span></div>
                </div>
                <div class="home">
                  <center>
                    <h5 class="animated infinite pulse"><b>SSCIntersolusi</b><br>Yogyakarta</h5>
                  </center>
                </div>
        </div>
      </section>
      </div>
      <div class="col-md-10 mt-3">
      <section class="tab">
       <div class="header">
        <img src="../../img/tugus.jpg" width="100%">
       </div>
       <br>
          <h2>Rating <?=$format;?>/5</h2>

          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Rating</th>
              <td>Aksi</td>
            </tr>
            <?php $si = 1;?>
            <?php
            while($row=mysqli_fetch_assoc($result)):
            ?>
            <tr>
              <td><?=$si;?></td>
              <td><?=$row["tgl"];?></td>
              <td><?=$row["rating"];?></td>
              <td><a href="ratingHapus.php?id=<?=$row["id"];?>">hapus</a></td>
            </tr>
            <?php $si++;?>
          <?php endwhile;?>
          </table>
      </section>
      </div>
    </div>
    <footer class="fixed-bottom">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social_icon">
      <li><a><img src="../../img/play.png" width="30px" id="icon" /></a></li>
      <li><a href="../../link/email.php"><img src="../../img/e.png"  width="30px"></a></li>
      <li><a href="https://web.facebook.com/sscijogja"><img src="../../img/f.png"  width="30px"></a></li>
      <li><a href="https://www.instagram.com/sscintersolusi/?hl=id"><img src="../../img/i.png"  width="30px"></a></li>
      <li><a href="https://api.whatsapp.com/send?phone=62082323198585&text=Hallo%20SSCI%20Yogyakarta" target="_blank"><img src="../../img/w.png" width="30px"></a></li>
    </ul>
    <ul class="menu">
           <li><a href="../../">Beranda</a></li>
           <li><a href="../../index.php#video">Video Kita</a></li>
           <li><a href="../../index.php#program">Program Kita</a></li>
           <li><a href="../../index.php#promo">Promo Kita</a></li>
           <li><a href="../../index.php#tentor">Tentor Kita</a></li>
           <li><a href="../../index.php#testimoni">Testimoni</a></li>
           <li><a href="../../index.php#alamat">Hubungi Kita</a></li>
        </ul>
         <p>@copyright SSCIntersolusi <?=$t;?></p>
  </footer>


    <audio id="mySong">
    <source src="../../img/jinggle.mp3" type="audio/mp3" />
    </audio>
   
    <script>
        var mySong = document.getElementById("mySong");
        var icon = document.getElementById("icon");

        icon.onclick = function () {
          if (mySong.paused) {
            mySong.play();
            icon.src = "../../img/pause.png";
          } else {
            mySong.pause();
            icon.src = "../../img/play.png";
          }
        };
    </script>
</body>
</html>
