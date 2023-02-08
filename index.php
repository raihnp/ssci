<?php
require 'fungsi.php';
$t = date('M-Y');
$result= mysqli_query($conn, "SELECT AVG(rating) AS average FROM rating");
$row = mysqli_fetch_assoc($result);
$average = $row['average'];
$format = number_format($average,1);
$result1 = mysqli_query($conn,"SELECT * FROM artikel  ORDER BY id DESC LIMIT 1");
$row1 = mysqli_fetch_assoc($result1);
$result2 = mysqli_query($conn,"SELECT * FROM promosi  ORDER BY id DESC LIMIT 1");
$row2 = mysqli_fetch_assoc($result2);
$result3 = mysqli_query($conn,"SELECT * FROM pdf ORDER BY id DESC LIMIT 1");
$row3 = mysqli_fetch_assoc($result3);
$result4 = mysqli_query($conn,"SELECT * FROM testi ORDER BY id DESC LIMIT 1");
$row4 = mysqli_fetch_assoc($result4);
$result5 = mysqli_query($conn,"SELECT * FROM vtesti ORDER BY id DESC LIMIT 1");
$row5 = mysqli_fetch_assoc($result5);
$result7 = mysqli_query($conn,"SELECT * FROM video");
$result8 = mysqli_query($conn,"SELECT * FROM tentor");
$ip      = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = time();
$s = mysqli_query($conn,"SELECT * FROM stat WHERE ip='$ip' AND tanggal='$tanggal'");
if(mysqli_num_rows($s) == 0){
$query="INSERT INTO stat VALUES('','$ip','$tanggal','1','$waktu')";
mysqli_query($conn, $query);
}else{
$query = "UPDATE stat SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'";
mysqli_query($conn, $query);  }
$stat = mysqli_query($conn, "SELECT * FROM stat WHERE tanggal='$tanggal' GROUP BY ip");
$pengunjung = mysqli_num_rows($stat);
$stat1 = mysqli_querY($conn,"SELECT SUM(hits) AS hits FROM stat");
$row = mysqli_fetch_assoc($stat1);
$total=$row["hits"];
$bataswaktu = time() - 30;
$stat2 = mysqli_query($conn,"SELECT * FROM stat WHERE online > '$bataswaktu'");
$pengunjungonline = mysqli_num_rows($stat2);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=n" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleres.css"/>
    <link rel='stylesheet' href='css/plyr.css'>
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>SSCIntersolusi</title>
  </head>
  <body> 
    <!--============= header ================== -->
    <section class="header">
          <div class="container">
            <nav class="fixed-top">
              <ul>
                <li><a href="">Beranda</a></li>
                <li><a href="#video">Video Kita</a></li>
                <li><a href="#program">Program Kita</a></li>
                <li><a href="#promo">Promo Kita</a></li>
                <li><a href="#tentor">Tentor Kita</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#alamat">Hubungi Kita</a></li>
                <li class="panah"><a href="box/login.php">Login<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                </svg></a></li>
              </ul>
              <div class="menu-toggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
              </div>
            </nav>
          </div>
    </section>
    <!--============== jumbotron ===============-->
    <section class="jumbotron d-none d-md-block">
            <div class="container">
              <img src="img/polos2.png" class="img-fluid satu" />
              <br>
              <div class="row">
                <div class="col-md-6">
                  <img src="img/ssci2.png" class="dua" />
                  <h1 class="duasatu">SSCIntersolusi Yogyakarta</h1>
                  <h2 class="duadua">SSCI adalah bimbingan belajar yang mengusung pola "The Basic Concept" Jadi siswa diharap benar benar siap untuk model soal apapun</h2>
                </div>
              </div>
            </div>
    </section>
<!-- .............................. -->
    <section class="jumbotron d-md-none">
            <div class="container">
            <img src="img/hp2.png" class="img-fluid satu" />
            </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <center><img src="img/ssci2.png" class="dua" /></center>
                  <center><h1 class="duasatu">SSCIntersolusi Yogyakarta</h1></center>
                  <center><h2 class="duadua">SSCI adalah bimbingan belajar yang mengusung pola "The Basic Concept" Jadi siswa diharap benar benar siap untuk model soal apapun</h2></center>
                </div>
              </div>
    </section>
     <!--=============== Artikel ===============-->
    <section class="artikel d-none d-md-block">
      <div class="container">
        <div class="row">
          <div col-md-12>
              <h1><span class="pisah"> Artikel  </span>  Kita</h1>
              <hr style="border: 2px solid black"/>
          </div>
          <div class="col-md-5 offset-md-1 mt-3">
              <center>
                <img src="img/artikel/<?=$row1["foto"];?>" width="100%" />
              </center>
          </div>
          <div class="col-md-5" style="text-align: justify;">
              <center><h1 class="satu"><?=$row1["judul"];?></h1></center>
              <h2 class="dua"><?=$row1["subject"];?></h2>
              <br>
              <center>
              <a href="<?=$row1["link"];?>" target="_blank" class="tiga">Lebih banyak</a>
              </center>
          </div>
       </div>
      </div>
    </section>
    <section class="artikel d-md-none">
        <div class="container">
            <h1><span class="pisah"> Artikel  </span>  Kita</h1>
            <hr style="border: 2px solid black" />
          <center>
             <img src="img/artikel/<?=$row1["foto"];?>" width="100%" />
          </center>
        </div>
          <div class="col-md-5" style="text-align: justify;">
            <h1 class="satu"><?=$row1["judul"];?></h1>
            <h2 class="dua"><?=$row1["subject"];?></h2>
            <center><a href="<?=$row1["link"];?>" target="_blank" class="tiga">Lebih banyak</a></center>
          </div>
    </section>
    <!--============== video kita ===============-->
    <section class="video" id="video">
       <div class="container">
          <div class="row">
              <div col-md-12>
                <h1><span class="pisah">Video</span> Kita</h1>
                <hr style="border: 2px solid black"/>
              </div>
              <div class="slider">
                <div class="owl-carousel video-section">
            <?php
            while($row=mysqli_fetch_assoc($result7)):
            ?>
                  <div class="slider-card">
                    <div class="item d-flex justify-content-center align-items-center mb-4">
                          <video class="js-player" poster="img/video/<?=$row["foto"];?>">
                              <source src="video/<?=$row["link"];?>.mp4" type="video/mp4">
                          </video> 
                    </div>
                    <h5 class="pb-4 text-center"><b><?=$row["judul"];?></b></h5>
                  </div>
            <?php endwhile;?>
                </div>
              </div>
          </div>
        </div>
    </section>
    <!--============== program kita ============ -->
    <section class="program d-none d-md-block" id="program">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <h1><span class="pisah">Program</span> Kita</h1>
            <hr style="border: 2px solid black"/>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="imgBx">
                <img src="img/sd.jpg" width="200px" />
              </div>
              <div class="contentBx"> 
                <h1>SD</h1>
                <h2 class="price text-center">Masa SD adalah masa yang menyenangkan, kami siap mendampingi ananda dengan suasana penuh keceriaan!</h2>
                <a href="asset/phpmailer2/sd.php" target="_blank" class="buy" style="text-decoration: none;">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="imgBx">
                <img src="img/smp.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>SMP</h1>
                <h2 class="price text-center">Masa SMP adalah masa mencari jati diri.. isi dengan kegiatan positif agar masa depan kalian tetap optimis, full semangat</h2>
                <a href="asset/phpmailer2/smp.php" target="_blank" class="buy" style="text-decoration: none;">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="imgBx">
                <img src="img/sma.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>SMA</h1>
                <h2 class="price text-center">Masa Sma Adalah masa yang penuh dengan cinta dan penentuan masa depan cemerlang, raih asa dan cintamu bersama SSCINTERSOLUSI!</h2>
                <a href="asset/phpmailer2/sma.php" target="_blank" class="buy" style="text-decoration: none;">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="imgBx">
                <img src="img/alumni.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>AlUMNI</h1>
                <h2 class="price">1 Kelas 2 orang</h2>
                <a href="asset/phpmailer2/alumni.php" target="_blank" class="buy" style="text-decoration: none;">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="imgBx">
                <img src="img/privat.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>PRIVAT</h1>
                <h2 class="price">1 Kelas 2 orang</h2>
                <a href="asset/phpmailer2/privat.php" target="_blank" class="buy style="text-decoration: none;"">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cardo">
              <br>
                <center>
                <h5 style="color: #fff;line-height: 16px"><b>Rekomendasikan Temanmu<b></h5>
                <h5 style="color: red;line-height: 16px">dan dapatkan reward</h5>
                </center>
              <div class="contentBx">
                <div class="contactForm">
                        <form method="POST" action="asset/phpmailer3/index.php">
                          <div class="inputBox">
                            <input type="text" name="nama" required="required" autocomplete="off"/>
                            <span>Nama</span>
                          </div>
                          <div class="inputBox">
                            <input type="text" name="note" required="required" autocomplete="off"/>
                            <span>Note Siswa</span>
                          </div>
                           <div class="inputBox">
                            <input type="text" name="rekomen" required="required" autocomplete="off"/>
                            <span>Nama yang direkomendasikan</span>
                          </div>
                          <div class="inputBox">
                            <input type="text" name="telpon" required="required" autocomplete="off"/>
                            <span>Telpon</span>
                          </div>
                          <center>
                            <input type="submit"class="btn btn-outline-success btn-sm"  name="SEND" value="SEND">
                          </center>
                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <section class="car d-md-none" id="program">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>
            <h1><span class="pisah">Program</span> Kita</h1>
            </center>
            <hr style="border: 2px solid black"/>
          </div>
        </div>
      </div>
      <div id="carausel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carausel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carausel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carausel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carausel" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carausel" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carausel" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="card">
              <div class="imgBx">
                <img src="img/sd.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>SD</h1>
                <h2 class="price text-center">Masa SD adalah masa yang menyenangkan, kami siap mendampingi ananda dengan suasana penuh keceriaan dan semangat!</h2>
                <a href="asset/phpmailer2/sd.php" class="buy">DAFTAR</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="card">
              <div class="imgBx">
                <img src="img/smp.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>SMP</h1>
                <h2 class="price text-center">Masa SMP adalah masa mencari jati diri.. isi dengan kegiatan positif agar masa depan kalian tetap optimis, full semangat</h2>
                <a href="asset/phpmailer2/smp.php" class="buy">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="imgBx">
                <img src="img/sma.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>SMA</h1>
                <h2 class="price text-center">Masa Sma Adalah masa yang penuh dengan cinta dan penentuan masa depan cemerlang, raih asa dan cintamu bersama SSCINTERSOLUSI!</h2>
                <a href="asset/phpmailer2/sma.php" class="buy">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="imgBx">
                <img src="img/alumni.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>AlUMNI</h1>
                <h2 class="price">1 Kelas 2 orang</h2>
                <a href="asset/phpmailer2/alumni.php" class="buy">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="imgBx">
                <img src="img/privat.jpg" width="200px" />
              </div>
              <div class="contentBx">
                <h1>PRIVAT</h1>
                <h2 class="price">1 Kelas 2 orang</h2>
                <a href="asset/phpmailer2/privat.php" class="buy">DAFTAR</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
          <div class="cardo">
              <div class="imgBx">
                <br>
              <center>
              <h2>Rekomendasikan<br>Temanmu</h2>
            </center>
              </div>
              <div class="contentBx">
              <div class="contactForm">
                      <form method="POST" action="asset/phpmailer/index.php">
                        <div class="inputBox">
                          <input type="text" name="nama" required="required" autocomplete="off"/>
                          <span>Nama</span>
                        </div>
                        <div class="inputBox">
                          <input type="text" name="telpon" required="required" autocomplete="off"/>
                          <span>Telpon</span>
                        </div>
                        <br>
                        <center>
                        <input type="submit"class="btn btn-outline-success btn-sm"  name="SEND" value="SEND">
                        </center>
                        <br>
                      </form>
               </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carausel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carausel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
<!--============== promo kita ==============-->
    <section class="promo" id="promo">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><span class="pisah">Promo </span> Kita</h1>
            <hr style="border: 2px solid black"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3" id="gambar">
            <a href="#gambar-1">
              <center>
           <img src="img/promosi/<?=$row2["foto1"];?>" width="280px" />
              </center>
            </a>
            <div class="overlay" id="gambar-1">
              <a href="#promo"><img src="img/promosi/<?=$row2["foto1"];?>"/></a>
            </div>
          </div>
          <div class="col-md-3" id="gambar">
            <a href="#gambar-2">
              <center>
           <img src="img/promosi/<?=$row2["foto2"];?>" width="280px" />
              </center>
            </a>
            <div class="overlay" id="gambar-2">
              <a href="#promo"><img src="img/promosi/<?=$row2["foto2"];?>"/></a>
            </div>
          </div>
          <div class="col-md-3" id="gambar">
            <a href="#gambar-3">
              <center>
           <img src="img/promosi/<?=$row2["foto3"];?>" width="280px" />
              </center>
            </a>
            <div class="overlay" id="gambar-3">
              <a href="#promo"><img src="img/promosi/<?=$row2["foto3"];?>" /></a>
            </div>
          </div>
          <div class="col-md-3" id="gambar">
            <a href="#gambar-4">
              <center>
           <img src="img/promosi/<?=$row2["foto4"];?>" width="280px" />
              </center>
            </a>
            <div class="overlay" id="gambar-4">
              <a href="#promo"><img src="img/promosi/<?=$row2["foto4"];?>" /></a>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--============ tentor kita ===============-->
    <section class="tentor" id="tentor">
      <div class="container">
        <div class="row>
          <div class="col-md-12">
            <h1><span class="pisah">Tentor </span> Kita</h1>
            <hr />
          </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php
            while($rows=mysqli_fetch_assoc($result8)):
            ?>
            <div class="swiper-slide">
              <div class="imgBz">
                <img src="img/tentor/<?=$rows["foto"];?>" width="200px">
              </div>
              <div class="data">
                <center>
                  <h5><?=$rows["lengkap"];?></h5>
                </center>
              </div>
              <div class="details">
                <center>
                  <h3><?=$rows["panggilan"];?></h3>
                  <h4><?=$rows["pelajaran"];?></h4>
                  <h5><?=$rows["lulusan"];?></h5>
                </center>
              </div>
            </div>
          <?php endwhile;?>
          </div>
        </div>
      </div>
    </section>
    <!--============ testimoni ================ -->
    <section class="testimoni1" id="testimoni">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><span class="pisah">Testimoni </span> Siswa</h1>
            <hr style="border: 2px solid black"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                 <img src="img/testimoni/<?=$row4["foto1"];?>" class="d-block w-100" alt="..." />
                  <div class="carousel-caption xxx">
                    <h5><b><?=$row4["nama1"];?></b></h5>
                    <p><?=$row4["testi1"];?></p> 
                     <h6><?=$row4["asal1"];?></h6>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/testimoni/<?=$row4["foto2"];?>" class="d-block w-100" alt="..." />
                  <div class="carousel-caption xxx">
                    <h5><b><?=$row4["nama2"];?></b></h5>
                    <p><?=$row4["testi2"];?></p> 
                     <h6><?=$row4["asal2"];?></h6>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/testimoni/<?=$row4["foto3"];?>" class="d-block w-100" alt="..." />
                  <div class="carousel-caption xxx">
                   <h5><b><?=$row4["nama3"];?></b></h5>
                    <p><?=$row4["testi3"];?></p> 
                     <h6><?=$row4["asal3"];?></h6>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <br>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators tombol" style="margin-bottom: 20px;">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner" >
                <div class="carousel-item active">
                  <video poster="img/video/<?=$row5["foto1"];?>" width="100%" controls>
                  <source src="video/<?=$row5["link1"];?>.mp4" type="video/mp4">
                  </video> 
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="carousel-item">
                  <video poster="img/video/<?=$row5["foto2"];?>" width="100%" controls>
                  <source src="video/<?=$row5["link2"];?>.mp4" type="video/mp4">
                  </video>
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="carousel-item">
                  <video poster="img/video/<?=$row5["foto3"];?>" width="100%" controls>
                  <source src="video/<?=$row5["link3"];?>.mp4" type="video/mp4">
                  </video>
                  <div class="carousel-caption">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 caru">
            <img src="img/testi.png" width="100%" />
          </div>
        </div>
      </div>
    </section>
<!--============ iklan ================ -->
    <section class="iklan1 d-none d-md-block" id="kita">
      <div class="container mt-5">
        <center>
        <img src="img/kenapa.png" width="80%">
        </center>
      </div>
    </section>
     <section class="iklan2 d-md-none">
          <div id="carousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
              </div>
              <center>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row qty">
                    <div class="col-md-3">
                      <img src="img/lokasi.png" width="120px">
                    </div>
                    <div class="col-md-9">
                    <h5>Letak Strategis</h5>
                    <h6>LBB SSCIntersolusi terletak di jantung kota Yogyakarta, sehingga sangat mudah di jangkau dari sekolah dimana kamu belajar</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row qty">
                    <div class="col-md-3">
                    <img src="img/kopi.png" width="80px">
                    </div>
                    <div class="col-md-9">
                      <h5>Kafe Belajar</h5>
                    <h6>LBB SSCIntersolusi menyajikan belajar dengan suasana rileks sehingga membuat hati dan fikiranmu nyaman. terdapat teh hangatnya juga loh</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row qty">
                    <div class="col-md-3">
                    <img src="img/monitor.png" width="80px">
                    </div>
                    <div class="col-md-9">
                    <h5>Terpantau</h5>
                    <h6>LBB SSCIntersolusi menyediakan presensi kehadiran yang ketat guna memantau seberapa jauh perubahan positifmu</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row qty">
                    <div class="col-md-3">
                    <img src="img/perlindungan.png" width="80px">
                    </div>
                    <div class="col-md-9">
                      <h5>kenyamanan kelas</h5>
                    <h6>LBB SSCIntersolusi dilengkapi dengan kelas nyaman dengan kapasitas yang sesuai dengan kondisi pandemi C19.</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row qty">
                    <div class="col-md-3">
                    <img src="img/garansi.png" width="80px">
                    </div>
                    <div class="col-md-9">
                    <h5>Produk berkualitas</h5>
                    <h6>LBB SSCIntersolusi menyediakan paket produk berupa buku-buku berkualitas untuk siswa intern dan juga menyediakan untuk siswa extern</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row qty">
                    <div class="col-md-3">
                    <img src="img/buku.png" width="80px">
                    </div>
                    <div class="col-md-9">
                      <h5>The basic concept</h5>
                    <h6>LBB SSCIntersolusi menyediakan konsep dasar sehingga siswa-siswi tak akan terjebak dalam model soal apapun</h6>
                    </div>
                  </div>
                </div>
              </div>
              </center>
              <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </section>
     <!--============= Hubungi kita ============= -->
    <section class="alamat" id="alamat">        
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><span class="pisah">Hubungi</span> Kita</h1>
            <hr style="border: 2px solid black"/>
          </div>
        </div>
        <div class="row a">
            <div class="col-md-4 cont">
              <div class="contactForm">
                <form method="POST" action="asset/phpmailer1/index.php">
                  <div class="inputBox">
                    <input type="text" name="nama" required="required" autocomplete="off"/>
                    <span>Nama Lengkap</span>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="email" required="required" autocomplete="off"/>
                    <span>Email</span>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="alamat" required="required" autocomplete="off"/>
                    <span>Alamat</span>
                  </div>
                  <div class="inputBox">
                    <textarea name="ket" required="required" autocomplete="off"></textarea>
                    <span>Pesan</span>
                  </div>
                  <center>
                    <input type="submit"class="btn btn-outline-success btn-sm"  name="SEND" value="SEND">
                  </center>
                </form>
              </div>
            </div>
           <div class="col-md-4 ab">
              <span>Yogyakarta Pusat</span><br>Jalan Sunaryo no 14 Kotabaru Yogyakarta<br>(Masjid Syuhada ke timur) <br>No Telp : (0274) 560466 <br>WA: <a href="https://wa.me/62082323198585">082323 19 8585</a><br /><br /><span>Yogyakarta Timoho</span><br>Jalan Ipda Tut Harsono no 20, Timoho Yogyakarta (Perempatan Balkot ke Utara)<br>
              WA : <a href="https://wa.me/62089689304567">0896 8930 4567</a><br><br> <span>Wedomartani Sleman</span><br>Jalan Raya Wedomartani, Ngemplak (Yogya Bay<br>100 meter ke utara)<br> No Telp : (0274) 883240
            </div>
            <div class="col-md-4 ab">
              <span>Bantul</span><br>Jalan Urip Sumoharjo No.28, Bejen, Kec. Bantul, Bantul (Simpang Lima Bejen ke barat) <br>No Telp :
              (0274) 367862 <br>WA : <a href="https://wa.me/62081779493799">0817 7949 3799</a><br><br><span>Solo Jateng</span><br>Jalan Monginsidi no 30, Gilingan, Kec Banjarsari, Surakarta (SMAN 1 Solo ke timur) <br>No telp (0271) 636188 dan (0271) 662312 <br>WA : <a href="https://wa.me/62081357085678">0813 5708 5678</a><br /><br /><span>Bontang Kalimantan Timur</span><br>Jalan Brigjend Katamso (Jl.
              Bayangkara no 8),<br>Bontang, Kaltim <br>No telp : (0548) 23404
            </div>
        </div>
      </div>
    </section>
    <!--================pdf========================-->
    <section  class="juk">
      <div class="container d-none d-md-block mb-3">
      <div class="row">
        <div class="col-md-12 ">
          <center><span class="pisah">Pdf</span></center>
        </div>
        <div class="col-md-5 offset-md-1">
          <a href="<?=$row3["link1"];?>" target="_blank"><h4><?=$row3["judul1"];?></h4></a>
          <a href="<?=$row3["link3"];?>" target="_blank"><h4><?=$row3["judul3"];?></h4></a>
          <a href="<?=$row3["link5"];?>" target="_blank"><h4><?=$row3["judul5"];?></h4></a>
        </div>
        <div class="col-md-5">
          <a href="<?=$row3["link2"];?>" target="_blank"><h4><?=$row3["judul2"];?></h4></a>
          <a href="<?=$row3["link4"];?>" target="_blank"><h4><?=$row3["judul4"];?></h4></a>
          <a href="<?=$row3["link6"];?>" target="_blank"><h4><?=$row3["judul6"];?></h4></a>
        </div>
      </div>
      </div>
      <div class="container d-md-none">
      <div class="row">
        <div class="col-md-12">
          <center><span class="pisah">Pdf</span></center>
        </div>
        <div class="col-md-12">
          <a href="<?=$row3["link1"];?>" target="_blank"><h4><?=$row3["judul1"];?></h4></a>
          <a href="<?=$row3["link2"];?>" target="_blank"><h4><?=$row3["judul2"];?></h4></a>
          <a href="<?=$row3["link3"];?>" target="_blank"><h4><?=$row3["judul3"];?></h4></a>
          <a href="<?=$row3["link4"];?>" target="_blank"><h4><?=$row3["judul4"];?></h4></a>
          <a href="<?=$row3["link5"];?>" target="_blank"><h4><?=$row3["judul5"];?></h4></a>
          <a href="<?=$row3["link6"];?>" target="_blank"><h4><?=$row3["judul6"];?></h4></a>
        </div>
      </div>
      </div>
    </section>
    <!--vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv footer vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv-->
    <section>
        <div class="row b">
          <div class="col-md-3 xx d-none d-md-block">
          <div class="xx1">
            <div class="xx1a">
                <div class="row">
                  <div class="col-md-4">
                    <img src="img/ssci.png" width="150px"> 
                  </div>
                  <div class="col-md-8 mt-3">
                   <h5><b>SSCIntersolusi</b></h5>
                    <h5><b>Yogyakarta</b></h5>
                  </div>
                </div>
                <h6>KANTOR PUSAT<br>
                Jl. Sunaryo 14 Kotabaru, Yogyakarta<br>
                Telp. (0274) 560466<br>WA : 0823 2319 8585
                <br>www.ssci.co.id</h6>
              <div class="xx1b">
                <center><h5>Lokasi</h5><br>
                <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.040764761153!2d110.3708903!3d-7.785502900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a582e2791bced%3A0x6f74292fee15be97!2sSSC%20Intersolusi%20Yogyakarta!5e0!3m2!1sid!2sid!4v1631017214642!5m2!1sid!2sid" width="400px" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </center>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-3 xx d-md-none">
          <div class="xx1">
            <div class="xx1a">
                <div class="row">
                  <div class="col-md-4">
                    <center><img src="img/ssci.png" width="150px">
                   <h5><b>SSCIntersolusi Yogyakarta</b></h5></center>
                  </div>
                </div>
                <center><h6>KANTOR PUSAT<br>
                Jl. Sunaryo 14 Kotabaru, Yogyakarta<br>
                Telp. (0274) 560466<br>WA : 0823 2319 8585
                <br>www.ssci.co.id</h6></center>
              <div class="xx1b">
                <center><h5>Lokasi</h5><br>
                <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.040764761153!2d110.3708903!3d-7.785502900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a582e2791bced%3A0x6f74292fee15be97!2sSSC%20Intersolusi%20Yogyakarta!5e0!3m2!1sid!2sid!4v1631017214642!5m2!1sid!2sid" width="400px" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </center>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-2 bb">
            </div>
          <div class="col-md-2">            
            <div class="feedback">
              <form action="asset/rating.php" method="post">
                <center><h4><?=$format;?> / 5 </h4>
                  <h5>Bagaimana menurutmu</h5></center>
                <div class="rating">
                  <input type="radio" name="rating" value="5" id="rating-5" />
                  <label for="rating-5"></label>
                  <input type="radio" name="rating" value="4" id="rating-4" />
                  <label for="rating-4"></label>
                  <input type="radio" name="rating" value="3" id="rating-3" />
                  <label for="rating-3"></label>
                  <input type="radio" name="rating" value="2" id="rating-2" />
                  <label for="rating-2"></label>
                  <input type="radio" name="rating" value="1" id="rating-1" />
                  <label for="rating-1"></label>
                  <div class="emoji-wrapper">
                    <div class="emoji">
                      <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                        <path
                          d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z"
                          fill="#f4c534"
                        />
                        <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff" />
                        <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347" />
                        <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63" />
                        <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff" />
                        <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347" />
                        <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63" />
                        <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347" />
                      </svg>
                      <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                        <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347" />
                        <path
                          d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z"
                          fill="#f4c534"
                        />
                        <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff" />
                        <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347" />
                        <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff" />
                        <path
                          d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z"
                          fill="#f4c534"
                        />
                        <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff" />
                        <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347" />
                        <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff" />
                      </svg>
                      <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                        <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347" />
                        <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff" />
                        <circle cx="340" cy="260.4" r="36.2" fill="#3e4347" />
                        <g fill="#fff">
                          <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10" />
                          <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                        </g>
                        <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347" />
                        <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff" />
                      </svg>
                      <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                        <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347" />
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                        <g fill="#fff">
                          <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                          <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81" />
                        </g>
                        <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                        <g fill="#fff">
                          <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1" />
                          <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81" />
                        </g>
                        <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                        <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff" />
                      </svg>
                      <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                        <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                        <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f" />
                        <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                        <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                        <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f" />
                        <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                        <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347" />
                        <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b" />
                      </svg>
                      <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <g fill="#ffd93b">
                          <circle cx="256" cy="256" r="256" />
                          <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                        </g>
                        <path
                          d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z"
                          fill="#e9eff4"
                        />
                        <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea" />
                        <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88" />
                        <g fill="#38c0dc">
                          <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                        </g>
                        <g fill="#d23f77">
                          <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                        </g>
                        <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347" />
                        <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b" />
                        <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2" />
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="rat">
                  <center>
                    <p><input type="submit" name="submit" class="btn btn-outline-light" value="Kirim" /></p>
                  </center>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-2 counter d-none d-md-block">
            <h5>Pengunjung Kita</h5>
            <div class="row mt-5">
              <div class="col-md-9">
                <h6>Total Pengunjung</h6>
              </div>
              <div class="col-md-3">
                <h6 style="text-align: right;"><?=$total;?></h6>
              </div>
              <hr>
              <div class="col-md-9">
                <h6>Hari ini</h6>
              </div>
              <div class="col-md-3">
                <h6 style="text-align: right;"><?=$pengunjung;?></h6>
              </div>
              <hr>
              <div class="col-md-9">
                <h6>On Line</h6>
              </div>
              <div class="col-md-3">
                <h6 style="text-align: right;"><?=$pengunjungonline;?></h6>
              </div>
              <hr>
            </div>
          </div>
          <div class="col-md-2 counter d-md-none mt-3">
            <center><h5 >Pengunjung Kita</h5>
            <table class="mt-3">
              <tr style="border-bottom: 1px solid #fff">
                <td width="300px"><h6>Total pengunjung</h6></td>
                <td style="text-align: right;"><h6><?=$total;?></h6></td>
              </tr>
              <tr class="mt-2" style="border-bottom: 1px solid #fff">
                <td width="300px"><h6>Hari ini</h6></td>
                <td style="text-align: right;"><h6><?=$pengunjung;?></h6></td>
              </tr>
              <tr class="mt-2" style="border-bottom: 1px solid #fff">
                <td width="300px"><h6>online</h6></td>
                <td style="text-align: right;"><h6><?=$pengunjungonline;?></h6></td>
              </tr>
            </table></center>
            </div>
          <center><hr style="color: #fff; width: 80%;"></center>
          <center><h6  class="copy" style="color: #fff">@copyright SSCIntersolusi <?=$t;?> | <a style="color: red">Beta Vers.</a></h6></center>
        </div>
    </section>
    <div class="move-up">
        <img src="img/play.png" width="40px" id="icon" /><br>
        <a href="box/email.php" target="_blank"> <img src="img/e.png" width="40px"></a><br>
        <a href="https://web.facebook.com/sscijogja" target="_blank"> <img src="img/f.png" width="40px"></a><br>
        <a href="https://www.instagram.com/sscintersolusi/?hl=id" target="_blank"> <img src="img/i.png" width="40px"></a><br>
        <a href="https://api.whatsapp.com/send?phone=62082323198585&text=Hallo%20SSCI%20Yogyakarta" target="_blank"><img src="img/w.png" width="40px"></a>
    </div>
    <audio id="mySong">
    <source src="img/jinggle.mp3" type="audio/mp3" />
    </audio>
    <script src="js/JQuery3.3.1.js"></script>   
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>   
    <script src="js/script.js"></script>
    <script src="js/plyr.js"></script>
    <script src="js/owl_video.js"></script> 
    <script>
        var mySong = document.getElementById("mySong");
        var icon = document.getElementById("icon");

        icon.onclick = function () {
          if (mySong.paused) {
            mySong.play();
            icon.src = "img/pause.png";
          } else {
            mySong.pause();
            icon.src = "img/play.png";
          }
        };
    </script>
  </body>
</html>