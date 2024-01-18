<?php 
include '../../config.php';

if (isset($_POST)) {

$kode_transaksi = $_POST['kode_transaksi'];    
$id_pemesanan = $_POST['id_pemesanan'];
$id_barang = $_POST['id_barang'];
$nama_produk = $_POST['nama_produk'];
$jumlah_produk = $_POST['jumlah_produk'];
$harga_produk = $_POST['harga_produk'];
$tgl_pemesanan = $_POST['tgl_pemesanan'];
$nama_customer = $_POST['nama_customer'];
$alamat = $_POST['alamat'];
$stock_ukuran = $_POST['stock_ukuran'];
$no_hp = $_POST['no_hp'];
$tgl_checkout = date("Y-m-d");
$bukti_pembayaran = 'Belum Ada';
$status_konfirmasi = 'Belum Bayar';

$total_stok= $stock_ukuran - $jumlah_produk;
// var_dump($total_stok);
// die();
 
$sql = "INSERT INTO pemesanan (id_pemesanan, kode_transaksi, id_barang, nama_produk, jumlah_produk, harga_produk, tgl_pemesanan, nama_customer, alamat, no_hp, tgl_checkout, bukti_pembayaran, status_konfirmasi)
VALUES ('$id_pemesanan','$kode_transaksi','$id_barang','$nama_produk','$jumlah_produk','$harga_produk','$tgl_pemesanan','$nama_customer','$alamat','$no_hp','$tgl_checkout','$bukti_pembayaran','$status_konfirmasi')";


if(mysqli_query($koneksi, $sql)){

    if($total_stok >=0){
        $update = mysqli_query($koneksi, "UPDATE jenis_produk SET stock_ukuran='$total_stok' WHERE nama_produk= '$nama_produk'" );
        header('Location: ../../keranjang.php?kode_transaksi='.$kode_transaksi);
}else{
    echo '<script>alert("Gagal Checkout , Keranjang Melebihi Stok Barang Anda !");
			window.location="../../dashboard_customer.php"</script>';
}



}
}