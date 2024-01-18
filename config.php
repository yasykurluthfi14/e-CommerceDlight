<?php

date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

$server = "localhost";
$user = "root";
$pass = "";
$database = "dlight";

	$koneksi = mysqli_connect($server,$user,$pass,$database);

	//Cek Koneksi
	if(!$koneksi){
		echo "Koneksi database gagal : " . mysqli_connect_errno();
	}
?>

