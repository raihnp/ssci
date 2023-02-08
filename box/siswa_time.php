
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
  </style>
</head>
<body>
 <div align="center" style="margin-top: 50px;">
            <a href="../logout.php"><img src="../../img/siswa/<?=$foto;?>" width="100"></a><br>
            <SCRIPT language=JavaScript>var d = new Date();
                        var h = d.getHours();
                        if (h < 10) { document.write('Selamat pagi,'); }
                        else { if (h < 15) { document.write('Selamat siang,'); }
                        else { if (h < 19) { document.write('Selamat sore,'); }
                        else { if (h <= 23) { document.write('Selamat malam,'); }
                        }}}
            </SCRIPT>
                <p class="text-center"><b><?=$nama;?></b></p>
        </div>
</body>
</html>