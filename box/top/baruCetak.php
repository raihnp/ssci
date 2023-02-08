<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y');
$tgl = date('d-M-Y');
$jam = date('H:i:s');
$id = $_SESSION["id"];
if($_SESSION["level"]!=='1'){
  header("Location:../login.php");
  exit;
}
$id_siswa=$_GET["id_siswa"];
$sql=mysqli_query($conn,"SELECT * FROM siswa WHERE id = $id_siswa");
$row = mysqli_fetch_assoc($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
	<title></title>
      <style>
body{
  background: url(img/tugu2.jpg);
  background-repeat: no-repeat;
  background-size: cover;
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
  color: #fff;
  font-size: 14px;
  transform: translateY(-25px);
}
    </style>
  </style>
</head>
<body>
<section>
  <div class="container mt-3 mb-5">
    <center class="h">
      <img src="img/ssci2.png" width="200px" />
        <h3>FORM Pendaftaran</h3>
        <h4><?=$row["kategori"];?> | <?=$row["nilai"];?> |  <?=$row["harga"];?></h4>
    </center>
    <div class="row">
      <div class="col-md-6">
            <div class="input">
              <div class="inputBox">
                    <input type="text" value="<?=$row["nama"];?>" />
                    <span>Nama Siswa</span>
              </div>
              <div class="inputBox">
                    <input type="text" value="<?=$row["tempat_lahir"];?>"/>
                    <span>Tempat lahir</span>
              </div>
              <div class="inputBox">
                    <input type="text" value="<?=$row["tgl_lahir"];?>"/>
                    <span>Tanggal lahir</span>
              </div>
              <div class="inputBox">
                    <input type="text"  value="<?=$row["email"];?>"/>
                    <span>Email siswa</span>
              </div>
              <div class="inputBox">
                    <input type="text" value="<?=$row["hp"];?>"/>
                    <span>Telepon Siswa</span>
              </div>
              <div class="inputBox">
                    <textarea><?=$row["alamat"];?></textarea>
                    <span>Alamat Siswa</span>
              </div>
              <div class="inputBox">
              <input type="text" value="<?=$row["sekolah"];?>"/>
                    <span>Asal Sekolah Siswa</span>
              </div>
               <div class="inputBox">
              <input type="text" value="<?=$row["promosi"];?>"/>
                    <span>Darimana mengetahui SSCI</span>
              </div>
            </div>
      </div>
      <div class="col-md-6">
            <div class="input">
              <div class="inputBox">
              <input type="text" value="<?=$row["ortu"];?>"/>
                    <span>Ortu</span>
              </div>
              <div class="inputBox">
              <input type="text" value="<?=$row["emailortu"];?>"/>
                  <span>Email Ortu</span>
              </div>
              <div class="inputBox">
              <input type="text" value="<?=$row["pekerjaanortu"];?>"/>
                    <span>Pekerjaan Ortu</span>
              </div>
              <div class="inputBox">
              <input type="text" value="<?=$row["hportu"];?>"/>
                    <span>Telepon Ortu</span>
              </div>
              <div class="inputBox">
                    <textarea><?=$row["alamatortu"];?></textarea>
                    <span>Alamat Ortu</span>
              </div>
              <div class="inputBox">
              <input type="text" value="<?=$row["jadwal"];?>"/>
                    <span>Pilihan Jadwal</span>
              </div>
              <br>
              <img src="../../img/siswa/<?=$row["foto"];?>" width="100px"><img src="../../img/siswa/<?=$row["img"];?>" width="100px">
            </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
