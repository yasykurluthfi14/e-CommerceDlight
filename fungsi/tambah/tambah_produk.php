<?php 
 
include '../../config.php';
 
error_reporting(0);
 
session_start();




if (isset($_POST)) {


	$id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $kategori_produk = $_POST['kategori_produk'];
    

 
        $sql = "SELECT * FROM produk WHERE nama_produk='$nama_produk'";


        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO produk (id_produk, nama_produk, kategori_produk)
                    VALUES ('$id_produk','$nama_produk','$kategori_produk')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Tambah data berhasil!')</script>";
                header("Location: ../../produk.php");
				$id_produk = "";
                $nama_produk = "";
                $kategori_produk = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops!.')</script>";
        }

	
         
   
}






?>
 