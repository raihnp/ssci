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
// $result=mysqli_query($conn, "SELECT * FROM user");
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
      background: #E3FFB4;
      }
  .tab {
      border: 2px solid black;
      padding: 5px;
    }
  .home{
      margin-top: -180px;
    }
  .container{
   text-align: center;
  vertical-align: middle;
  line-height: 600px;
  height: 600px;
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
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
          <section>
            <div class="container d-none d-md-block">
              <img src="../../img/sscigif.gif" class="img-fluid">
            </div>
          </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
     </div>
    </div>
      <?php
       include("../footer.php");
      ?>
</body>
</html>