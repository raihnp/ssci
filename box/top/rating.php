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

$res= mysqli_query($conn, "SELECT AVG(rating) AS average FROM rating");
$rows = mysqli_fetch_assoc($res);
$average = $rows['average'];
$format = number_format($average,1);


$result=mysqli_query($conn, "SELECT * FROM rating ORDER BY id_rating DESC");
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
    a {
      text-decoration: none;
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
              <td><a href="ratingHapus.php?id_rating=<?=$row["id_rating"];?>">hapus</a></td>
            </tr>
            <?php $si++;?>
          <?php endwhile;?>
          </table>
      </section>
      </div>
    </div>
    <?php
       include("../footer.php");
      ?>
</body>
</html>
