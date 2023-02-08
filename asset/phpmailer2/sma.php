<?php
require '../../fungsi.php';
$t = date('M-Y');

$result = mysqli_query($conn,"SELECT * FROM sma  ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=n" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandhelFriendly" content="true">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>SMA</title>
     <style>
  @media (max-width: 575.98px) { 
 body{
height: 3900px;
 }
}
    </style>
  </head>
  <body>
    <!--============= header ================== -->
     <section class="header">
            <nav class="fixed-top">
              <ul>
                <li><a href="../../">Beranda</a></li>
                <li><a href="../../index.php#video">Video Kita</a></li>
                <li><a href="../../index.php#program">Program Kita</a></li>
                <li><a href="../../index.php#promo">Promo Kita</a></li>
                <li><a href="../../index.php#tentor">Tentor Kita</a></li>
                <li><a href="../../index.php#testimoni">Testimoni</a></li>
                <li><a href="../../index.php#alamat">Hubungi Kita</a></li>
                <li class="panah"><a href="../../box/login.php">Login<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                </svg></a></li>
              </ul>
              <div class="menu-toggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
              </div>
            </nav>
     <!-- vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv -->
<div class="row justify-content-center isi mx-auto">
      <div class="col-md-4">
        <div class="container">
          <div class="innersma">
            <div class="content">
              <span><?=$row["tawar1"];?></span>
              <h2><?=$row["kategori1"];?></h2>
            </div>
            <div class="lower">
              <img src="img/trophy.png" class="image" alt="" />
              <ul class="features-list">
                <br><br>
                <li><b><?=$row["tingkat1"];?></b></li>
                <li><?=$row["tingkata1"];?></li>
                <li><?=$row["tingkatb1"];?></li>
                <li><a href=""><?=$row["tingkatc1"];?></a></li>
                <li><?=$row["harga1"];?></li>
              </ul>
            </div>
          </div>
          <a href="form.php?no=1&pen=sma" target="_blank"><button class="cta"><p><b>Ambil Kelas <?=$row["kategori1"];?></b></p></button></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="container">
          <div class="innersma">
            <div class="content">
              <span><?=$row["tawar2"];?></span>
              <h2><?=$row["kategori2"];?></h2>
            </div>
            <div class="lower">
              <img src="img/trophy.png" class="image" alt="" />
              <ul class="features-list">
                <br><br>
                <li><b><?=$row["tingkat2"];?></b></li>
                <li><?=$row["tingkata2"];?></li>
                <li><?=$row["tingkatb2"];?></li>
                <li<?=$row["tingkatc2"];?></li>
                <li><?=$row["harga2"];?></li>
              </ul>
            </div>
          </div>
          <a href="form.php?no=2&pen=sma" target="_blank"><button class="cta"><p><b>Ambil Kelas <?=$row["kategori2"];?></b></p></button></a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="container">
          <div class="innersma">
            <div class="content">
              <span><?=$row["tawar3"];?></span>
              <h2><?=$row["kategori3"];?></h2>
            </div>
            <div class="lower">
              <img src="img/trophy.png" class="image" alt="" />
              <ul class="features-list">
                <br><br>
                <li><b><?=$row["tingkat3"];?></b></li>
                <li><?=$row["tingkata3"];?></li>
                <li><?=$row["tingkatb3"];?></li>
                <li><?=$row["tingkatc3"];?></li>
                <li><?=$row["harga3"];?></li>
              </ul>
            </div>
          </div>
          <a href="form.php?no=3&pen=sma" target="_blank"><button class="cta"><p><b>Ambil Kelas <?=$row["kategori3"];?></b></p></button></a>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="container">
          <div class="innersma">
            <div class="content">
              <span><?=$row["tawar4"];?></span>
              <h2><?=$row["kategori4"];?></h2>
            </div>
            <div class="lower">
              <img src="img/trophy.png" class="image" alt="" />
              <ul class="features-list">
                <br><br>
                <li><b><?=$row["tingkat4"];?></b></li>
                <li><?=$row["tingkata4"];?></li>
                <li><?=$row["tingkatb4"];?></li>
                <li><?=$row["tingkatc4"];?></li>
                <li><?=$row["harga4"];?></li>
              </ul>
            </div>
          </div>
          <a href="form.php?no=4&pen=sma" target="_blank"><button class="cta"><p><b>Ambil Kelas <?=$row["kategori4"];?></b></p></button></a>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="container">
          <div class="innersma">
            <div class="content">
              <span><?=$row["tawar5"];?></span>
              <h2><?=$row["kategori5"];?></h2>
            </div>
            <div class="lower">
              <img src="img/trophy.png" class="image" alt="" />
              <ul class="features-list">
                <br><br>
                <li><b><?=$row["tingkat5"];?></b></li>
                <li><?=$row["tingkata5"];?></li>
                <li><?=$row["tingkatb5"];?></li>
                <li><?=$row["tingkatc5"];?></li>
                <li><?=$row["harga5"];?></li>
              </ul>
            </div>
          </div>
          <a href="form.php?no=5&pen=sma" target="_blank"><button class="cta"><p><b>Ambil Kelas <?=$row["kategori5"];?></b></p></button></a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="container">
          <div class="innersma">
            <div class="content">
              <span><?=$row["tawar6"];?></span>
              <h2><?=$row["kategori6"];?></h2>
            </div>
            <div class="lower">
              <img src="img/trophy.png" class="image" alt="" />
              <ul class="features-list">
                <br><br>
                <li><b><?=$row["tingkat6"];?></b></li>
                <li><?=$row["tingkata6"];?></li>
                <li><?=$row["tingkatb6"];?></li>
                <li><?=$row["tingkatc6"];?></li>
                <li><?=$row["harga6"];?></li>
              </ul>
            </div>
          </div>
          <a href="form.php?no=6&pen=sma" target="_blank"><button class="cta"><p><b>Ambil Kelas <?=$row["kategori6"];?></b></p></button></a>
        </div>
      </div>
    </div>
     <!-- vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv -->

     </section>
    <div class="move-up">
      <div>
        <img src="../../img/play.png" width="40px" id="icon" /><br>
        <a href="../../link/email.php" target="_blank"> <img src="../../img/e.png" width="40px"></a><br>
        <a href="https://web.facebook.com/sscijogja"> <img src="../../img/f.png" width="40px"></a><br>
        <a href="https://www.instagram.com/sscintersolusi/?hl=id"> <img src="../../img/i.png" width="40px"></a><br>
        <a href="https://api.whatsapp.com/send?phone=628123456789&text=Hallo%20Agan%20Baik"> <img src="../../img/w.png" width="40px"></a>
      </div>
    </div>

    <center>
<div class="row bawah fixed-bottom">
    <p>@copyright SSCIntersolusi <?=$t;?></p>
</div>
</center>
    <audio id="mySong">
    <source src="../../img/jinggle.mp3" type="audio/mp3" />
    </audio>
  
    <script src="../../js/JQuery3.3.1.js"></script>  
    <script src="../../js/script.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
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