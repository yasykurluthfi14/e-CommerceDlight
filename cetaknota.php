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
$username = $_SESSION['username'];
$name = $_SESSION['nama'];

$kode_transaksi = $_GET['kode_transaksi'];

    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE nama_customer = '$name'
                                    ORDER BY tgl_checkout ASC") 
                                    or die('Ada kesalahan pada query tampil Laporan : '.mysqli_error($koneksi));
    $count  = mysqli_num_rows($query);

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>NOTA BELANJA</title>
        <link rel="stylesheet" type="text/css" href="assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            NOTA BELANJA
        </div>
    
   
   
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind("$hari_ini"); ?>
        </div>
   
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE TRANSAKSI</th>
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
      echo " <tr>
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
            $pendapatan += $total;
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$kode_transaksi</td>
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
            <table style="float:right;text-align:left;" width="50%">
            <?php $total_pendapatan = format_rupiah($pendapatan)  ?>
                <tr>
                    <th>Total Belanja :</th> 
                        <td>Rp <?php echo $total_pendapatan ?> 
                        </td> 
                </tr>

                                       
            </table>

            <div id="footer-tanggal">
                Palembang, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Admin
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
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>