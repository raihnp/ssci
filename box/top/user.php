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
$rows = mysqli_fetch_assoc($sql);
$id_admin=$rows["id_admin"];
$sql1=mysqli_query($conn,"SELECT * FROM admin WHERE id_admin = $id_admin");
$rows1 = mysqli_fetch_assoc($sql1);
$foto=$rows1["foto"];
$nama = $rows1["nama"];

$result=mysqli_query($conn, "SELECT * FROM user WHERE id_admin != '0'");

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
    $level = 2;
    $status = 'Aktif';
    $id_siswa = '';

$query = "INSERT INTO admin VALUES ('','$tgl','$nama','$foto','$level')";
    mysqli_query($conn, $query);
   $id_admin = mysqli_insert_id($conn);

$query1 = "INSERT INTO user VALUES ('','$tgl','$id_admin','$id_siswa','$user','$pass','$level','$status')";
    mysqli_query($conn, $query1);

    if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah');
    document.location.href = '../login.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal diubah');
    document.location.href = '../login.php';
    </script>";}
}

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
    height: 1800px;
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
        <?php
      include("top_time.php");
      include("top_menu.php");
      include("top_animasi.php");
        ?>
      </div>
      <div class="col-md-10 mt-3">
      <section class="tab">
       <div class="header">
        <img src="../../img/tugus.jpg" width="100%">
       </div>
       <br>
          <h2>USER</h2>

          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Aksi</th>
            </tr>
            <?php $si =1;?>
            <?php
            while($row=mysqli_fetch_assoc($result)):
            ?>
            <tr>
              <td><?=$si;?></td>
              <td><?=$row["tgl"];?><br><hr><?=$row["user"];?><br><hr><?=$row["level"];?></td>
              <td><a href="userHapus.php?id=<?=$row["id"];?>">Hapus</a></td>
            </tr>
            <?php $si++;?>
          <?php endwhile;?>
          </table>
      </section>
      <section class="log mt-5">
          <center>
              <h2>Registrasi Admin</h2> 
              <form method="POST" action="" enctype="multipart/form-data">
              <input type="text" name="nama" placeholder="nama" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="text" name="user" placeholder="user" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="password" name="pass" placeholder="password" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="password" name="pass2" placeholder="konfirmasi password" required autocomplete="off" style="margin-bottom: 10px;"><br>
              <input type="file" name="image"><br>
              <input type="submit" name="register" class="btn btn-outline-success btn-sm" value="Daftar"/>
            </form>
          </center> 
        </section>
      </div>
    </div>
    <?php
       include("../footer.php");
      ?>
</body>
</html>
