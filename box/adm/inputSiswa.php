<?php
require '../../fungsi.php';
if(isset($_POST['SEND'])){
	$tgl = date('d-m-Y H:i:s');
	$kategori = $_POST["kategori"];
	$kelas = $_POST["kelas"];
	$biaya = $_POST["biaya"];
	$namaSiswa = $_POST["namaSiswa"];
	$idSiswa = $_POST["idSiswa"];
	$tempatSiswa = $_POST["tempatSiswa"];
	$tanggalSiswa = $_POST["tanggalSiswa"];
	$emailSiswa = $_POST["emailSiswa"];
	$teleponSiswa  = $_POST["teleponSiswa"];
	$alamatSiswa = $_POST["alamatSiswa"];
	$asalSekolah= $_POST["asalSekolah"];
	$infoSsci = $_POST["infoSsci"];
	$namaOrtu = $_POST["namaOrtu"];
	$emailOrtu = $_POST["emailOrtu"];
	$kerjaanOrtu = $_POST["kerjaanOrtu"];
	$teleponOrtu = $_POST["teleponOrtu"];
	$alamatOrtu = $_POST["alamatOrtu"];
	$jadwalSiswa = $_POST["jadwalSiswa"];
		$image = $_FILES["image"]["name"];
		$ekstensi_diperbolehkan = array('png','jpg');
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
				  document.location.href = 'input.php';</script>";}
		  }else{echo"<script>
				alert('Data gagal ditambahkan ... Ekstensi Foto yang diperbolehkan png dan jpg');
				document.location.href = 'input.php';</script>";}

			$img = $_FILES["img"]["name"];
			$ekstensi_diperbolehkan = array('png','jpg');
			$x = explode('.', $img);
			$ekstensi = strtolower(end($x));
			$ukuran = $_FILES['img']['size'];
			$foto2_tmp = $_FILES['img']['tmp_name'];  
			 if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 2000000){
				  $imgBaru = uniqid();
				  $imgBaru .= '.';
				  $imgBaru .= $ekstensi;
				 $move = move_uploaded_file($foto2_tmp, '../../img/admin/'.$imgBaru);
					if($move){$foto2 = $imgBaru; 
					}else{echo 'GAGAL MENGUPLOAD foto2';}
				}else{echo"<script>
					  alert('Data gagal ditambahkan ... Ukuran foto2 max 2MB');
					  document.location.href = 'input.php';</script>";}
			  }else{echo"<script>
					alert('Data gagal ditambahkan ... Ekstensi foto2 yang diperbolehkan png dan jpg');
					document.location.href = 'input.php';</script>";}
$nama = $idSiswa;
$pass = password_hash($nama, PASSWORD_DEFAULT);
$level = 3;
	$query = "INSERT INTO user VALUES ('','$tgl','$nama', '$pass','$foto','$level')";
    mysqli_query($conn, $query);

	$query = "INSERT INTO siswa VALUES ('','$tgl','$kategori','$kelas','$biaya','$namaSiswa','$idSiswa','$tempatSiswa','$tanggalSiswa','$emailSiswa','$teleponSiswa','$alamatSiswa','$asalSekolah','$infoSsci','$namaOrtu','$emailOrtu','$kerjaanOrtu','$teleponOrtu','$alamatOrtu','$jadwalSiswa','$foto','$foto2')";
    mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil ditambah');
    document.location.href = 'input.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal ditambahkan');
    document.location.href = 'input.php';
    </script>";}
  }

?>