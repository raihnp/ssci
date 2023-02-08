<?php
require '../../fungsi.php';

if(isset($_POST['SEND'])){

	require_once('function.php');

	$tgl = date('d-m-Y H:i:s');
	$nama = $_POST["nama"];
	$note = $_POST["note"];
	$rekomen = $_POST["rekomen"];
	$telpon = $_POST["telpon"];
	
	$query = "INSERT INTO teman VALUES ('','$tgl','$nama','$note','$rekomen','$telpon')";
	mysqli_query($conn, $query);

	
    $to       = 'feriantotri@gmail.com';
    $subject  = 'Rekomendasi Siswa';
    $message  = " Nama : $nama<br>
                  Tanggal : $tgl<br>
                  Note : $note<br>
                  Rekomen : $rekomen<br>
                  Telpon : $telpon";
    smtp_mail($to, $subject, $message, '', '', 0, 0, 0);
}
?>