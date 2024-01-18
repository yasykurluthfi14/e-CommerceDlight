<?php 
session_start();

	include '../../config.php';



if(isset($_GET['keranjang'])){
		$id_pemesanan= $_GET['keranjang'];

		if(!empty($id_pemesanan)){
			mysqli_query($koneksi,"delete from pemesanan where id_pemesanan='$id_pemesanan'");

			header("location:../../keranjang.php");
		}

	
		
	}



?>