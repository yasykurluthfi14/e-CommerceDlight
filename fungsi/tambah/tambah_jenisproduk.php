

<?php 
include '../../config.php';

if (isset($_POST)) {

$id = $_POST['id'];
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$stock_ukuran = $_POST['stock_ukuran'];
$ukuran_produk = $_POST['ukuran_produk'];
$bahan_produk = $_POST['bahan_produk'];
$warna_produk = $_POST['warna_produk'];
$harga_produk = $_POST['harga_produk'];

 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:../../jenis_produk.php?id_produk=$id_produk?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/img/portfolio/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO jenis_produk (id, id_produk, nama_produk, stock_ukuran, ukuran_produk, bahan_produk, warna_produk, harga_produk, foto)
        VALUES ('$id','$id_produk','$nama_produk','$stock_ukuran','$ukuran_produk','$bahan_produk','$warna_produk','$harga_produk','$xx')");
		header("location:../../jenis_produk.php?id_produk=$id_produk?alert=berhasil");
	}else{
		header("location:../../jenis_produk.php?id_produk=$id_produk?alert=gagal_ukuran");
	}
}

}
 