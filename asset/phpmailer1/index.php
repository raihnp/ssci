
<?php
require '../../fungsi.php';

if(isset($_POST['SEND'])){

	require_once('function.php');
	
    $tgl = date('d-m-Y H:i:s');
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $ket = $_POST["ket"];

    $query = "INSERT INTO email VALUES ('','$tgl','$nama','$email','$alamat','$ket')";
    mysqli_query($conn, $query);

    $to       = 'feriantotri@gmail.com';
    $subject  = 'Hubungi SSCI';
    $message  = " Nama : $nama<br>
                  Tanggal : $tgl<br>
                  Email : $email<br>
                  Alamat : $alamat<br>
                  Keterangan : $ket";
    smtp_mail($to, $subject, $message, '', '', 0, 0, 0);
	}
?>