<?php
require '../../fungsi.php';

$kategori = $_GET["kategori"];
$nilai = $_GET["nilai"];
$harga = $_GET["harga"];

if(isset($_POST['SEND'])){
	require_once('function.php');
	$tgl = date('d-m-Y H:i:s');
	$nama = $_POST["nama"];
	$jk = '';
	$pin = '';
	$jenjang = '';
	$kelas = '';
	$program ='';
	$sekolah = $_POST["sekolah"];
	$tgl_lahir = $_POST["tgl_lahir"];
	$tempat_lahir = $_POST["tempat_lahir"];
	$alamat = $_POST["alamat"];
	$kota = '';
	$telpon = '';
	$hp = $_POST["hp"];
	$email = $_POST["email"];
	$hobi = '';
	$daftar = '';
	$jadwal = $_POST["jadwal"];
	$prestasi = '';
	$keterangan = '';

	if ($foto = $_FILES["foto"]["name"])
		{$ekstensi_diperbolehkan = array('png','jpg');
		 $x = explode('.', $foto);
		 $ekstensi = strtolower(end($x));
		 $ukuran = $_FILES['foto']['size'];
		 $foto_tmp = $_FILES['foto']['tmp_name'];  
		 if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 2000000){
			  $fotoBaru = uniqid();
			  $fotoBaru .= '.';
			  $fotoBaru .= $ekstensi;
			  $move = move_uploaded_file($foto_tmp, '../../img/siswa/'.$fotoBaru);
				if($move){$foto = $fotoBaru; 
				}else{echo 'GAGAL MENGUPLOAD foto';}
			 }else{echo"<script>
				  alert('Data gagal ditambahkan ... Ukuran FOTO max 2MB');
				  document.location.href = '../../index.php';</script>";}
		     }else{echo"<script>
				alert('Data gagal ditambahkan ... Ekstensi Foto yang diperbolehkan png dan jpg');
				document.location.href = '../../index.php';</script>";}}
	 else {$foto = '';}

	$ortu = $_POST["ortu"];
	$alamatortu = $_POST["alamatortu"];
	$kotaortu = '';
	$telponortu = '';
	$hportu = $_POST["hportu"];
	$emailortu = $_POST["emailortu"];
	$pekerjaanortu = $_POST["pekerjaanortu"];
	$keteranganortu = '';
	$promosi =$_POST["promosi"];
	$penerima = '';
	$status = '';
	$baru = 'ok';
	$subject = 'Pendaftar Baru';

	if($img = $_FILES["img"]["name"])
	   {$ekstensi_diperbolehkan = array('png','jpg');
		$x = explode('.', $img);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['img']['size'];
		$img_tmp = $_FILES['img']['tmp_name'];  
		 if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 2000000){
			  $imgBaru = uniqid();
			  $imgBaru .= '.';
			  $imgBaru .= $ekstensi;
			 $move = move_uploaded_file($img_tmp, '../../img/siswa/'.$imgBaru);
				if($move){$img = $imgBaru; 
				}else{echo 'GAGAL MENGUPLOAD img';}
			}else{echo"<script>
				  alert('Data gagal ditambahkan ... Ukuran img max 2MB');
				  document.location.href = '../../index.php';</script>";}
		     }else{echo"<script>
				alert('Data gagal ditambahkan ... Ekstensi img yang diperbolehkan png dan jpg');
				document.location.href = '../../index.php';</script>";}}
		 else{$img = '';}


$query = "INSERT INTO siswa VALUES ('','$kategori','$nilai','$harga','$tgl','$nama','$jk','$pin','$jenjang','$kelas','$program','$sekolah','$tgl_lahir','$tempat_lahir','$alamat','$kota','$telpon','$hp','$email','$hobi','$daftar','$jadwal','$prestasi','$keterangan','$foto','$ortu','$alamatortu','$kotaortu','$telponortu','$hportu','$emailortu','$pekerjaanortu','$keteranganortu','$promosi','$penerima','$status','$baru','$img')";
    mysqli_query($conn, $query);

		

		$to       = 'feriantotri@gmail.com';
    	$subject  = 'SSCI';
    	$message  = "Nama Siswa : $nama<br>
				Email Siswa : $email<br>
				Telpon Siswa : $hp<br>
				Asal Sekolah : $sekolah<br>
				Nama Orang Tua :$ortu<br> 
				Telpon Orang Tua : $hportu";

    smtp_mail($to, $subject, $message, '', '', 0, 0, 0);

}
?>