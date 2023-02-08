<?php
session_start();
require '../fungsi.php';

// $agent=@$_SERVER[HTTP_USER_AGENT];
// $ip=@$_SERVER['REMOTE_ADDR'];

if(isset($_POST["login"])){
	$tgl = date('d-m-Y H:i:s');
	$user = $_POST["user"];
	$pass = $_POST["pass"];


$result = mysqli_query($conn, "SELECT * FROM user WHERE user = '$user'");

if(mysqli_num_rows($result) === 1) {

	$row = mysqli_fetch_assoc($result);
	$id=$row["id"];
	$level = $row["level"];
	$status = $row["status"];
	if (password_verify($pass, $row["pass"])){
		$_SESSION["login"] = true;
		$_SESSION["id"] = $id;
		$_SESSION["level"]=$level;
		$_SESSION["status"]=$status;
		// $query = "INSERT INTO login VALUES ('','$tgl','$user','$agent','$ip','$id','$level')";
  //   	mysqli_query($conn, $query);
    	if($row["level"]=='1'){
    		header("location: top/login.php");
    	}elseif ($row["level"]=='2') {
    		header("location: adm/login.php");
    	}elseif ($row["level"]=='3') {
    		header("location: tentor/login.php");
    	}elseif ($row["level"]=='5') {
    		header("location: akram/login.php");
    	}else{
		header("location: siswa/login.php");}
		exit; 
	}
}
header("location: ../index.php");
}



?>