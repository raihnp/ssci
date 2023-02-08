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

.h {
  color: black;
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
  color: black;
  font-size: 14px;
  transform: translateY(-25px);
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

       <!-- ------------------------ -->
          <section>
  <div class="container mt-3">
    <center><h1>Inputan Siswa</h1></center>
    <br><hr>
    <form action="inputSiswa.php" method="POST" enctype="multipart/form-data" >
    <div class="row">
      <div class="col-md-4">
         <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="kategori" autocomplete="off"/>
                    <span>Kategori</span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
         <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="kelas" autocomplete="off"/>
                    <span>Kelas</span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
         <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="biaya" autocomplete="off"/>
                    <span>Biaya</span>
              </div>
          </div>
      </div>
      <div class="col-md-6">
            <div class="input">
              <div class="row">
                <div class="col-md-10">
                  <div class="inputBox">
                      <input type="text" required="required" name="namaSiswa" autocomplete="off"/>
                      <span>Nama Siswa</span>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="inputBox">
                      <input type="text" required="required" name="idSiswa" autocomplete="off"/>
                      <span>id Siswa</span>
                  </div>
                </div>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="tempatSiswa" autocomplete="off"/>
                    <span>Tempat lahir</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="tanggalSiswa" autocomplete="off"/>
                    <span>Tanggal lahir</span>
              </div>
              <div class="inputBox">
                    <input type="text"  required="required" name="emailSiswa" autocomplete="off"/>
                    <span>Email siswa</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="teleponSiswa" autocomplete="off"/>
                    <span>Telepon Siswa</span>
              </div>
              <div class="inputBox">
                    <textarea required="required" name="alamatSiswa" autocomplete="off"></textarea>
                    <span>Alamat Siswa</span>
              </div>
              <div class="inputBox">
              <input type="text"  required="required" name="asalSekolah" autocomplete="off"/>
                    <span>Asal Sekolah Siswa</span>
              </div>
              <div class="inputBox">
              <input type="text"  required="required" name="infoSsci" autocomplete="off"/>
                    <span>Asal Info SSCI</span>
              </div>
          </div>
      </diV>
      <div class="col-md-6">
            <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="namaOrtu" autocomplete="off"/>
                    <span>Nama Ortu</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="emailOrtu" autocomplete="off"/>
                  <span>Email Ortu</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="kerjaanOrtu" autocomplete="off"/>
                    <span>Pekerjaan Ortu</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="teleponOrtu" autocomplete="off"/>
                    <span>Telepon Ortu</span>
              </div>
              <div class="inputBox">
                    <textarea required="required" name="alamatOrtu" autocomplete="off"></textarea>
                    <span>Alamat Ortu</span>
              </div>
              <div class="form-group">
                <label for="tahu" class="control-label">Pilihan Jadwal</label>
                  <select name="jadwalSiswa" class="form-control" id="tahu" >
                        <option>Pilih</option>
                        <option>Senin-Rabu-Jumat sesi 1 </option>
                        <option>Senin-Rabu-Jumat sesi 2 </option>
                        <option>Selasa-Kamis-Sabtu sesi 1</option>
                        <option>Selasa-Kamis-Sabtu sesi 2</option>
                  </select>
              </div>
              <div class="form-group">
                <label  class="control-label">Foto</label>
                <input type="file" name="image" class="form-control"/>
              </div>
              <div class="form-group">
                <label  class="control-label">Bukti pembayaran</label>
                <input type="file" name="img" class="form-control"/>
              </div>
          </div>
      </div>
    <center><input type="submit" class="btn btn-outline-success btn-sm mt-2" name="SEND" value="SEND" /></center>
  </form>
  </div>
</section>

          <!-- -------------------------- -->
</section>
<section class="d-none d-md-block">
<span style="font-weight: bolt; color: red; font-size: 20px;" class="mt-2">Catatan</span><br>
<span>Ukuran foto 1 : 1 </span><br>
<span>Ukuran file true </span>
</section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
      </div>
    </div>
      <?php
       include("../footer.php");
      ?>
</body>
</html>
