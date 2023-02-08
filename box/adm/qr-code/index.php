<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../../login.php");
  exit;
}

require '../../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
$sql=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$rows = mysqli_fetch_assoc($sql);
$id_admin=$rows["id_admin"];
$sql1=mysqli_query($conn,"SELECT * FROM admin WHERE id_admin = $id_admin");
$rows1 = mysqli_fetch_assoc($sql1);
$foto=$rows1["foto"];
$nama = $rows1["nama"];

 if(isset($_POST['SEND'])){
  $tgl = $_POST["tgl"];
  $jam = $_POST["jam"];
  $text = $_POST["text"];
  $tentor = $_POST["tentor"];
  $angka=range(0,9); //code dibuat dari angka 0-9
  shuffle($angka); //untuk mengacak angka
  $ambilangka=array_rand($angka,8); //pengambilan angka sebanyak 6 digit
  $angkastring=implode("",$ambilangka); //membuat angka-angka yang digenerate dipisahkan dengan -
  $code="SSCI".$angkastring;

  $query = "INSERT INTO qr VALUES ('','$tgl','$jam','$text','$tentor','$code')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
      echo "<script>alert('Data berhasil ditambah');
      document.location.href = 'index2.php';
      </script>";} 
      else {
      echo"<script>alert('Data gagal ditambahkan');
      document.location.href = 'index2.php';
      </script>";}
}
?>


<!doctype html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../style.css" />
    <link rel="stylesheet" href="../../styles.css" />
    <link rel="stylesheet" href="../../../css/animasi.css">
    <link rel="stylesheet" href="../../../css/animate.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
   <title>Generator</title>
  <style>
body{
  background-color: #AED768;
}
.h {
  color: #fff;
}
.input {
  width: 100%;
  padding-top: 10px;
  padding-left: 20px;
  padding-right: 20px;
}
.input h2 {
  font-size: 30px;
  color: #333;
  font-weight: 500;
}
.input .inputBox {
  position: relative;
  width: 100%;
  margin-top: 10px;
}
.input .inputBox input,
.input .inputBox textarea {
  width: 100%;
  padding: 5px 0;
  font-size: 16px;
  margin: 10px 0;
  border: none;
  border-bottom: 2px solid #333;
  outline: none;
  resize: none;
}
.input .inputBox span {
  position: absolute;
  left: 0px;
  top: 5px;
  padding: 5px;
  font-size: 16px;
  margin: 5px;
  pointer-events: none;
  transition: 0.5s;
  color: #666;
}
.input .inputBox input:focus ~ span,
.input .inputBox input:valid ~ span,
.input .inputBox textarea:focus ~ span,
.input .inputBox textarea:valid ~ span {
  color: blackf;
  font-size: 14px;
  transform: translateY(-25px);
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

  document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

      element.addEventListener('click', function (e) {

        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;  

        if(nextEl) {
          e.preventDefault(); 
          let mycollapse = new bootstrap.Collapse(nextEl);

            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
              mycollapse.show();
              // find other submenus with class=show
              var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
              // if it exists, then close all of them
            if(opened_submenu){
              new bootstrap.Collapse(opened_submenu);
            }

            }
          }

      });
    })

  }); 
  // DOMContentLoaded  end
</script>
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
        <img src="../../../img/ssci2.png" height="40">
        SSCIntersolusi
      </a>
    </nav>
    <div class="row">
      <div class="col-md-2 mt-3">
        <div align="center" style="margin-top: 50px;">
            <a href="../../logout.php"><img src="../../../img/admin/<?=$foto;?>" width="100"></a><br>
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
<nav class="sidebar card">
  <div class="card-header text-center">
                Admin
            </div>

<ul class="nav flex-column" id="nav_accordion">
  <li class="nav-item has-submenu">
    <a class="nav-link" href="#">  Database <i class="bi small bi-caret-down-fill"></i> </a>
    <ul class="submenu collapse">
      <li><a href="../tabel.php">db_Siswa</a></li>
      <li><a href="../email.php">db_email</a></li>
      <li><a href="../teman.php">db_Rekomendasi</a></li>
      <li><a href="../qr-code/index2.php">db_Jadwal</a></li>
    </ul>
  </li>
  <li class="nav-item has-submenu">
    <a class="nav-link" href="#"> Ganti <i class="bi small bi-caret-down-fill"></i> </a>
    <ul class="submenu collapse">
            <li><a href="../sdin.php">Ganti SD</a></li>
            <li><a href="../smpin.php">Ganti SMP</a></li>
            <li><a href="../smain.php">Ganti SMA</a></li>
            <li><a href="../alumniin.php">Ganti ALUMNI</a></li>
            <li><a href="../privatin.php">Ganti PRIVAT</a></li>
            <li><a href="../artikel.php">Ganti Artikel</a></li>
            <li><a href="../videoKita.php">Ganti Video kita</a></li>
            <li><a href="../promosi.php"> Ganti Promo kita</a></li>
            <li><a href="../tentor.php">Ganti Tentor kita</a></li>
            <li><a href="../testi.php">Ganti Testimoni</a></li>
            <li><a href="../vtesti.php">Ganti Vidio Testi</a></li>
            <li><a href="../pdf.php">Ganti Pdf</a></li>
    </ul>
  </li>
  <li class="nav-item has-submenu">
    <a class="nav-link" href="#"> Input <i class="bi small bi-caret-down-fill"></i> </a>
    <ul class="submenu collapse">
      <li><a href="input.php">Input_siswa</a></li>
            <li><a href="../user.php">Input_user</a></li>
            <li><a href="../qr-code/index.php">Input_qr</a></li>
    </ul>
  </li>
  <li class="nav-item has-submenu">
    <a class="nav-link" href="../#"> Backup </a>
    <ul class="submenu collapse">
    </ul>
  </li>
</ul>
</nav>
</div>
        <?php
            include("../../animasi.php");
        ?>
      </div>
      <div class="col-md-10 mt-3">
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
  <section  class="d-md-none">
        <center><h3>Open in PC</h3></center>
      </section>
      <section class="tab d-none d-md-block">
       <div class="header">
        <img src="../../../img/tugus.jpg" width="100%">
       </div>
       <br>
        <h3>FORM Jadwal</h3>
    </center>
    <form action="" method="POST" enctype="multipart/form-data" >
            <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="tgl" autocomplete="off"/>
                    <span>Untuk Tanggal</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="jam" autocomplete="off"/>
                    <span>Untuk Jam</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="text" autocomplete="off"/>
                    <span>Mata Pelajaran</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="tentor" autocomplete="off"/>
                    <span>Tentor</span>
              </div>
            </div>
    <center><input type="submit" class="btn btn-outline-success btn-sm" name="SEND" value="Kirim" /></center>
  </form>
  </div>
</section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
      </div>
    </div>
        <?php
         include("../../footer.php");
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
