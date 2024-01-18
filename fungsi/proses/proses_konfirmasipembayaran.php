<?php 
 
include '../../config.php';
 
error_reporting(0);
 
session_start();



if(isset($_GET['konfirmasipembayaran'])){
    $id_pemesanan= $_GET['konfirmasipembayaran'];
    $tgl_checkout = date("Y-m-d");
    $status_konfirmasi = 'Done';


    $query    = mysqli_query($koneksi, "SELECT id_barang, jumlah_produk FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");
    $databaru = mysqli_fetch_row($query);
    $id_barang = $databaru[0];
    $jumlah_produk = $databaru[1];


    
    //$query1    = mysqli_query($koneksi, "SELECT stock_ukuran FROM jenis_produk WHERE id_produk = '$id_barang'");
    //$databaru1 = mysqli_fetch_row($query1);
    //$stock_ukuran = $databaru1[0];

    //$restock = $stock_ukuran - $jumlah_produk;








    if(!empty($id_pemesanan)){
        mysqli_query($koneksi,"UPDATE pemesanan SET tgl_checkout = '$tgl_checkout', status_konfirmasi='$status_konfirmasi' WHERE id_pemesanan='$id_pemesanan'");

        header("location:../../pemesanan.php");
    }


    
}






?>
 