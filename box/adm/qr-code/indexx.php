<?php
require '../../../fungsi.php';

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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Form Pendaftaran <?=$kategori;?> </title>
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
    </style>
</head>
<body>
    

<section>
  <div class="container mt-3">
    <center>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
