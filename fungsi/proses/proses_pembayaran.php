<?php 
include '../../config.php';

if (isset($_POST)) {

$kode_transaksi = $_POST['kode_transaksi'];
$status_konfirmasi = 'Konfirmasi Pembayaran';


 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['bukti_pembayaran']['name'];
$ukuran = $_FILES['bukti_pembayaran']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:../../pembayaran.php?kode_transaksi=$kode_transaksi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], '../../assets/img/bukti_pembayaran/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "UPDATE pemesanan SET bukti_pembayaran ='$xx', status_konfirmasi = '$status_konfirmasi' WHERE kode_transaksi= '$kode_transaksi'");
		header("location:../../notifikasi.php?kode_transaksi=$kode_transaksi");
	}else{
		header("location:../../pembayaran.php?kode_transaksi=$kode_transaksi");
	}
}

}
 
 