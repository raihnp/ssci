<?php
require '../fungsi.php';

	
if(isset($_POST["submit"])){
    $tgl = date('d-m-Y H:i:s');
    $rating = $_POST["rating"];

    $query = "INSERT INTO rating VALUES ('', '$tgl', '$rating')";
		mysqli_query($conn, $query);


		if (mysqli_affected_rows($conn) > 0) {
	    echo "<script>alert('Data berhasil ditambah');
	    document.location.href = '../index.php';
	    </script>";} 
	  	else {
	    echo"<script>alert('Data gagal ditambahkan');
	    document.location.href = '../index.php';
	    </script>";}
}
?>