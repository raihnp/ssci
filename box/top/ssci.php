<?php
require '../../fungsi.php';

if(isset($_POST["register"])){
  $tgl = date('d-m-Y H:i:s');
  $nama = strtolower(stripslashes($_POST["nama"]));
  $user = strtolower(stripslashes($_POST["user"]));
  $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
  $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
    if($pass !== $pass2) {
      echo "<script> alert('konfirmasi password tidak sesuai');
      document.location.href = 'ssci.php';
          </script>";} 
    $pass = password_hash($pass, PASSWORD_DEFAULT);

  $image = $_FILES["image"]["name"];
  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $x = explode('.', $image);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['image']['size'];
  $foto_tmp = $_FILES['image']['tmp_name'];  
   if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 2000000){
      $imageBaru = uniqid();
      $imageBaru .= '.';
      $imageBaru .= $ekstensi;
     $move = move_uploaded_file($foto_tmp, '../../img/admin/'.$imageBaru);
      if($move){$foto = $imageBaru; 
      }else{echo 'GAGAL MENGUPLOAD foto';}
    }else{echo"<script>
        alert('Data gagal ditambahkan ... Ukuran FOTO max 2MB');
        document.location.href = 'ssci.php';</script>";}
    }else{echo"<script>
      alert('Data gagal ditambahkan ... Ekstensi Foto yang diperbolehkan png dan jpg');
      document.location.href = 'ssci.php';</script>";}
    $level = 1;
    $status = 'Aktif';
    $id_siswa = '';

$query = "INSERT INTO admin VALUES ('','$tgl','$nama','$foto','$level')";
    mysqli_query($conn, $query);
   $id_admin = mysqli_insert_id($conn);

$query1 = "INSERT INTO user VALUES ('','$tgl','$id_admin','$id_siswa','$user','$pass','$level','$status')";
    mysqli_query($conn, $query1);

     header("Location:../../index.php");
};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../styles.css" />
	<title></title>
  <style>
 
  </style>
</head>
<body>
	<center>
              <h1>Rahasia</h1> 
              <form method="POST" action="" enctype="multipart/form-data">
              <input type="text" name="nama" placeholder="nama" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="text" name="user" placeholder="user" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="password" name="pass" placeholder="password" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="password" name="pass2" placeholder="konfirmasi password" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="file" name="image"><br>
              <input type="submit" name="register" class="btn btn-outline-success btn-sm" value="Daftar"/>
            </form>
          </center> 
</body>
</html>