<?php 
session_start();

	include '../../config.php';

	if(isset($_GET['produk'])){
		$id_produk= $_GET['produk'];

		if(!empty($id_produk)){
			mysqli_query($koneksi,"delete from produk where id_produk='$id_produk'");

			header("location:../../produk.php");
		}

	
		
	}
	if(isset($_GET['kelolauser_admin'])){
		$id= $_GET['kelolauser_admin'];

		if(!empty($id)){
			mysqli_query($koneksi,"delete from login where id='$id'");

			header("location:../../kelolauser_admin.php");
		}

	
		
	}
	if(isset($_GET['kelolauser_customer'])){
		$id= $_GET['kelolauser_customer'];

		if(!empty($id)){
			mysqli_query($koneksi,"delete from login where id='$id'");

			header("location:../../kelolauser_customer.php");
		}

	
		
	}
	if(isset($_GET['id']) AND isset($_GET['id_produk'])){
		$id= $_GET['id'];
		$id_produk= $_GET['id_produk'];



		if(!empty($id) AND !empty($id_produk)){
			mysqli_query($koneksi,"delete from jenis_produk where id='$id'");

			header("location:../../jenis_produk.php?id_produk=$id_produk");
		}

	
		
	}

	if(isset($_GET['pemesanan'])){
		$id_pemesanan= $_GET['pemesanan'];

		if(!empty($id_pemesanan)){
			mysqli_query($koneksi,"delete from pemesanan where id_pemesanan='$id_pemesanan'");

			header("location:../../pemesanan.php");
		}

	
		
	}
    
    
	
   
?>