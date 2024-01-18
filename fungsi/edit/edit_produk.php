<?php 
 
include '../../config.php';
 
error_reporting(0);
 
session_start();




if (isset($_POST)) {


	$id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $kategori_produk = $_POST['kategori_produk'];

        
            $sql = "UPDATE produk SET nama_produk='$nama_produk', kategori_produk ='$kategori_produk' WHERE id_produk= '$id_produk'";

            if(mysqli_query($koneksi, $sql)){
           
                echo "<script>alert('Edit data berhasil!')</script>";
                header("Location: ../../produk.php");
            }else{
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }

			
	
         
   
}






?>
 