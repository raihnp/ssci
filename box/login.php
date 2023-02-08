<?php
require '../fungsi.php';
$t = date('M-Y'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/animasi.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Login</title>
    <style>
body{
  min-height: 800px;
}
.navbar img{
  margin-left: 30px;
}
.home{
 position: relative;
 margin-top: -200px;
  color: black;
}
.log{
  margin-top: 100px;
}
    </style>
  </head>
  <body>
      <nav class="navbar fixed-top navbar-light">
        <a class="navbar-brand" href="../index.php">
          <img src="../img/ssci2.png" height="50px" />
        </a>
      </nav>
      <?php
        include("animasi.php");
      ?>
        <section class="log">
          <center>
                <h1>LOGIN</h1> 
                <form method="POST" action="kirim_login.php">
                  <input type="text" name="user" placeholder="user" required autocomplete="off" style="margin-bottom: 10px;">
                  <input type="password" name="pass" placeholder="password" required autocomplete="off" style="margin-bottom: 10px;"><br>
                  <input type="submit" name="login" class="btn btn-outline-success btn-sm" value="Login" /> <a href="../index.php" class="btn btn-outline-success btn-sm">cancel</a>
                </form>
          </center> 
        </section>


            <!--============================================================-->
  <footer class="fixed-bottom">
    <center>
        <p>@copyright SSCIntersolusi <?=$t;?></p>
      </center>
  </footer>
  </body>
</html>
