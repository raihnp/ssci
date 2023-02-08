<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../../index.php");
  exit;
}
require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
if($_SESSION["level"]!=='1'){
  header("Location:../../index.php");
  exit;
}
$id_siswa=$_GET["id_siswa"];

$result=mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id_siswa");
$row=mysqli_fetch_assoc($result);


if(isset($_POST["submit"])){
  $nama = $_POST["nama"];
  $jk = $_POST["jk"];
  $pin = $_POST["pin"];
  $jenjang = $_POST["jenjang"];
  $kelas = $_POST["kelas"];
  $program = $_POST["program"];
  $sekolah = $_POST["sekolah"];
  $tgl_lahir = $_POST["tgl_lahir"];
  $tempat_lahir = $_POST["tempat_lahir"];
  $alamat = $_POST["alamat"];
  $kota = $_POST["kota"];
  $telpon = $_POST["telpon"];
  $hp = $_POST["hp"];
  $email = $_POST["email"];
  $hobi = $_POST["hobi"];
  $daftar = $_POST["daftar"];
  $jadwal = $_POST["jadwal"];
  $prestasi = $_POST["prestasi"];
  $keterangan = $_POST["keterangan"];
  $fotolama = $_POST["fotolama"];
     if($_FILES['filefoto']['error']===4) {
    $foto = $fotolama;
  }else{
  $filefoto = $_FILES["filefoto"]["name"];
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $filefoto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['filefoto']['size'];
      $foto_tmp = $_FILES['filefoto']['tmp_name'];  
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 500000){
         $filefotoBaru = uniqid();
          $filefotoBaru .= '.';
          $filefotoBaru .= $ekstensi;
         $move = move_uploaded_file($foto_tmp, '../../img/siswa/'.$filefotoBaru);
          if($move){
            if (unlink('../../img/siswa/'.$fotolama))
            { "Deleted ../../img/siswa/$fotolama";
              "<META HTTP-EQUIV=Refresh CONTENT='1; URL=tabel.php'>";
            } $foto =$filefotoBaru;
          }else{echo"<script>
                      alert(' Gagal uploud foto');
                      document.location.href = 'tabel.php';
                      </script>"; return false;}
        }else{echo"<script>
                    alert('Gagal uploud foto ... Ukuran FOTO max 500 kb');
                    document.location.href = 'tabel.php'; 
                    </script>";return false;}
      }else{echo"<script>
                  alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                  document.location.href = 'tabel.php';
                  </script>";return false;}
      } 
  $ortu = $_POST["ortu"];
  $alamatortu = $_POST["alamatortu"];
  $kotaortu = $_POST["kotaortu"];
  $telponortu = $_POST["telponortu"];
  $hportu = $_POST["hportu"];
  $emailortu = $_POST["emailortu"];
  $pekerjaanortu = $_POST["pekerjaanortu"];
  $keteranganortu = $_POST["keteranganortu"];
  $promosi = $_POST["promosi"];
  $penerima = $_POST["penerima"];
  $status = $row["status"];
        $query = "UPDATE siswa SET  nama='$nama',jk='$jk',pin='$pin',jenjang='$jenjang',kelas='$kelas',program='$program',sekolah='$sekolah',tgl_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',alamat='$alamat',kota='$kota',telpon='$telpon',hp='$hp',email='$email',hobi='$hobi',daftar='$daftar',jadwal='$jadwal',prestasi='$prestasi',keterangan='$keterangan',foto='$foto',ortu='$ortu',alamatortu='$alamatortu',kotaortu='$kotaortu',telponortu='$telponortu',hportu='$hportu',emailortu='$emailortu',pekerjaanortu='$pekerjaanortu',keteranganortu='$keteranganortu',promosi='$promosi',penerima='$penerima',status='$status' WHERE id = '$id_siswa'";
        mysqli_query($conn, $query);
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil dirubah');
    document.location.href = 'siswaDb.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal dirubah');
    document.location.href = 'siswaDb.php';
    </script>";}
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
	<title></title>
  <style>
body{
  min-height: 1200px;
  background-color: #aed768;
}
.h4 {
  color: black;
}
</style>
  </style>
</head>
<body>
<div>
<section>
  <div class="container mt-3">
    <center class="h">
      <img src="../../img/ssci.png" width="200px" />
        <h2>FORM Edit</h2>
    </center>
    <br>
    <div class="row">
      <div class="col-md-6">
        <h3>Siswa</h3>
        <hr>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                 <label class="control-label">Nama Lengkap</label>
                 <input type="text" class="form-control"  name="nama" value="<?=$row["nama"];?>">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
           <label for="jk" class="control-label">Gender</label><br>
           <input type="radio" name="jk" value="L" <?php if($row["jk"]=='L'){echo 'checked';}?>>L |
           <input type="radio" name="jk" value="P" <?php if($row["jk"]=='P'){echo 'checked';}?>>P
        </div>
            </div>
             <div class="col-md-2">
              <div class="form-group">
                 <label class="control-label">id Siswa</label>
                 <input type="text" class="form-control" name="pin" value="<?=$row["pin"];?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Jenjang</label>
                 <input type="text" class="form-control" name="jenjang" value="<?=$row["jenjang"];?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Kelas</label>
                 <input type="text" class="form-control" name="kelas" value="<?=$row["kelas"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Program</label>
                 <input type="text" class="form-control" name="program" value="<?=$row["program"];?>">
              </div>
            </div>
          </div>

              <div class="form-group">
                 <label class="control-label">Asal Sekolah</label>
                 <input type="text" class="form-control" name="sekolah" value="<?=$row["sekolah"];?>">
              </div>


             <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Tanggal Lahir</label>
                 <input type="text" class="form-control" name="tgl_lahir" value="<?=$row["tgl_lahir"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Tempat Lahir</label>
                 <input type="text" class="form-control" name="tempat_lahir" value="<?=$row["tempat_lahir"];?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                 <label class="control-label">Alamat</label>
                 <input type="text" class="form-control" name="alamat" value="<?=$row["alamat"];?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Kota</label>
                 <input type="text" class="form-control" name="kota" value="<?=$row["kota"];?>">
              </div>
            </div>
          </div>

              <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Telpon</label>
                 <input type="text" class="form-control" name="telpon" value="<?=$row["telpon"];?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Hp</label>
                 <input type="text" class="form-control" name="hp" value="<?=$row["hp"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">email</label>
                 <input type="text" class="form-control" name="email" value="<?=$row["email"];?>">
              </div>
            </div>
          </div>


             <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Hobi</label>
                 <input type="text" class="form-control" name="hobi" value="<?=$row["hobi"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Terdaftar</label>
                 <input type="text" class="form-control" name="daftar" value="<?=$row["daftar"];?>">
              </div>
            </div>
          </div>


 
        <div class="form-group">
           <label for="agama" class="control-label">Pilihan Jadwal</label>
            <select name="jadwal" class="form-control">
               <option><?=$row["jadwal"];?></option>
               <option>Senin-Rabu-Jumat sesi 1 </option>
               <option>Senin-Rabu-Jumat sesi 2 </option>
               <option>Selasa-Kamis-Sabtu sesi 1</option>
               <option>Selasa-Kamis-Sabtu sesi 2</option>
            </select>
        </div>




 

              <div class="form-group">
                 <label class="control-label">Prestasi</label>
                 <input type="text" class="form-control" name="prestasi" value="<?=$row["prestasi"];?>">
              </div>

 <div class="form-group">
                 <label class="control-label">Keterangan</label>
                 <input type="text" class="form-control" name="keterangan" value="<?=$row["keterangan"];?>">
              </div>

<div class="form-group">
           <label for="filefoto" class="control-label">Foto Lama : </label><img src="../../img/siswa/<?=$row["foto"]; ?>" width = "50px">
           <input type="file" name="filefoto" value="" class="form-control" id="filefoto">
            <input type="hidden" name="fotolama" value="<?=$row["foto"]; ?>">
        </div>


              
      </diV>
      <div class="col-md-6">
        <h3>Orang Tua Siswa</h3>
        <hr>
              <div class="form-group">
                 <label class="control-label">Nama</label>
                 <input type="text" class="form-control" name="ortu" value="<?=$row["ortu"];?>">
              </div>

              <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                 <label class="control-label">Alamat</label>
                 <input type="text" class="form-control" name="alamatortu" value="<?=$row["alamatortu"];?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Kota</label>
                 <input type="text" class="form-control" name="kotaortu" value="<?=$row["kotaortu"];?>">
              </div>
            </div>
          </div>

<div class="row">
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Telpon</label>
                 <input type="text" class="form-control" name="telponortu" value="<?=$row["telponortu"];?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                 <label class="control-label">Hp</label>
                 <input type="text" class="form-control" name="hportu" value="<?=$row["hportu"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Email</label>
                 <input type="text" class="form-control" name="emailortu" value="<?=$row["emailortu"];?>">
              </div>
            </div>
          </div>



              <div class="form-group">
                 <label class="control-label">Pekerjaan</label>
                 <input type="text" class="form-control" name="pekerjaanortu" value="<?=$row["pekerjaanortu"];?>">
              </div>
              <div class="form-group">
                 <label class="control-label">Keterangan</label>
                 <input type="text" class="form-control" name="keteranganortu" value="<?=$row["keteranganortu"];?>">
              </div>

<br><br><br><br><br><br><br><br><br><br><br>
<h3>Admin</h3>
<hr>
 <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Promosi</label>
                 <input type="text" class="form-control" name="promosi" value="<?=$row["promosi"];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label">Penerima</label>
                 <input type="text" class="form-control" name="penerima" value="<?=$row["penerima"];?>">
              </div>
            </div>
          </div>
          </div>
  </div>
  <br>
  <center>
     <input type="submit" name="submit" class="btn btn-outline-dark" value="Ubah"/>
  </center>
</form>
</section>
  </div>
</div>
</body>
</html>
