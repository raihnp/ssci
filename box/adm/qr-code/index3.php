<?php
require '../../../fungsi.php';
date_default_timezone_set('Asia/Jakarta');

 $id = $_GET["id"];
 $sql = mysqli_query($conn, "SELECT * FROM qr WHERE id = $id");
 $row=mysqli_fetch_assoc($sql);
?>


<!doctype html>
<head>
    <title>Generator</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="instascan.min.js"></script>
  <script type="text/javascript">
function date_time(id)
{
date = new Date;
year = date.getFullYear();
month = date.getMonth();
// months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
d = date.getDate();
day = date.getDay();
// days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Saptu');
h = date.getHours();
if(h<10)
{
h = "0"+h;
}
m = date.getMinutes();
if(m<10)
{
m = "0"+m;
}
s = date.getSeconds();
if(s<10)
{
s = "0"+s;
}
result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
document.getElementById(id).innerHTML = result;
setTimeout('date_time("'+id+'");','1000');
return true;
}
</script>
<script type="text/javascript"> 
history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    </script>
</head>

<body>
  
   
	<div class="container">
            	
              <center>
                <div style="margin-top: 20px; margin-left: 20px">
   <span id="date_time"></span>
   <script type="text/javascript">window.onload = date_time('date_time');</script>
  </div>
     <h2 class="mt-3">QR CODE</h2>
              <?php
              $code = $row["code"];
              $tempdir = "qr/";
              $namafile   ="$code.png";
              require_once('phpqrcode/qrlib.php');
              $kode = $code;
              QRCode::png("$kode",$tempdir.$namafile,"H",10,2);
              ?>
              

              <a href="index2.php"><img src="qr/<?=$namafile;?>"></a><br>
              <?=$row["code"];?>

                <br>
               <h2><b>KELAS</b></h2>
                <h3><?=$row["text"];?> | <?=$row["tentor"];?></h3>
              </center>
            
  </div>





</body>
</html>
