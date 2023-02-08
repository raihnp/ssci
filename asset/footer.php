
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
  </style>
</head>
<body>
   <footer class="fixed-bottom">
      <div class="d-none d-md-block">
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
      </div>
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