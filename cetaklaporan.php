<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "config.php";
// panggil fungsi untuk format tanggal
include "fungsi/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "fungsi/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$hari = $_GET['hari'];
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];


// ambil data hasil submit dari form
$tgl     = date("$tahun-$bulan-$hari");



if (isset($_GET['bulan']) && empty($_GET['hari']) && empty($_GET['tahun'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE MONTH(tgl_checkout) = '$bulan'
                                     AND status_konfirmasi = 'done'
                                     ORDER BY id_pemesanan ASC") 
                                     or die('Ada kesalahan pada query tampil Laporan : '.mysqli_error($koneksi));
    $count  = mysqli_num_rows($query);

}else if (empty($_GET['bulan']) && empty($_GET['hari']) && isset($_GET['tahun'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE YEAR(tgl_checkout) = '$tahun'
                                     AND status_konfirmasi = 'done'
                                     ORDER BY id_pemesanan ASC") 
                                     or die('Ada kesalahan pada query tampil Laporan : '.mysqli_error($koneksi));
    $count  = mysqli_num_rows($query);

}else if (isset($_GET['bulan']) && isset($_GET['hari']) && isset($_GET['tahun'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE tgl_checkout = '$tgl'
                                     AND status_konfirmasi = 'done'
                                     ORDER BY id_pemesanan ASC") 
                                     or die('Ada kesalahan pada query tampil Laporan : '.mysqli_error($koneksi));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN Keuangan</title>
        <link rel="stylesheet" type="text/css" href="assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN KEUANGAN TOKO DLIGHT 
        </div>
    <?php  
    if (empty($hari) && isset($bulan) && empty($tahun)) { ?>
        <div id="title-tanggal">
            Bulan <?php echo tgl_eng_to_ind($bulan); ?>
        </div>
    <?php
    } else if (empty($hari) && empty($bulan) && isset($tahun)) { ?>
        <div id="title-tanggal">
            Tahun <?php echo tgl_eng_to_ind($tahun); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
         <?php echo tgl_eng_to_ind($tgl); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">ID PEMESANAN</th>
                        <th height="20" align="center" valign="middle">PRODUK</th>
                        <th height="20" align="center" valign="middle">JUMLAH</th>
                        <th height="20" align="center" valign="middle">HARGA PRODUK</th>
                        <th height="20" align="center" valign="middle">TANGGAL</th>
                        <th height="20" align="center" valign="middle">CUSTOMER</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data tidak ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                </tr>";
    }
    // jika data ada
    else {
        // tampilkan data
        $total = 0;
        $pendapatan = 0;
        while ($data = mysqli_fetch_assoc($query))  {
            $total = $data['harga_produk'];
            $jumlah = $data['jumlah_produk'];
            $pendapatan += $total;
            $jumlah_produk += $jumlah;
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[id_pemesanan]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[nama_produk]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[jumlah_produk]</td>
                        <td width='155' height='13' align='center' valign='middle'>$data[harga_produk]</td>
                        <td width='100' height='13' align='center' valign='middle'>$data[tgl_checkout]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[nama_customer]</td>
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>
            <br>
            <table style="float:right;text-align:left;" width="50%">
            <?php $total_pendapatan = format_rupiah($pendapatan)  ?>
                <tr>
                    <th>Jumlah Barang Terjual :</th> 
                        <td>   <?php echo $jumlah_produk ?> 
                        </td> 
                </tr>
                <tr>
                    <th>Total Pendapatan :</th> 
                        <td>Rp <?php echo $total_pendapatan ?> 
                        </td> 
                </tr>

                                       
            </table>

            <div id="footer-tanggal">
                Palembang, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                Mega Utami
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA KEUANGAN DLIGHT.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>