<?php
require 'config.php';
include 'fungsi/fungsi_rupiah.php';
include 'template/header_customer.php';

$kode_transaksi = $_SESSION['id'];

if($role != 'customer'){
  header("Location: login.php");
  }

if (isset($_POST)) {

    $id_pemesanan = $_POST['id_pemesanan'];
    $nama_produk = $_POST['nama_produk'];
    $jumlah_produk = $_POST['jumlah_produk'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];
    $ukuran_produk = $_POST['ukuran_produk'];
    $nama_customer = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    //GET Id_produk dari nama_produk yang ingin dipesan
    $query    = mysqli_query($koneksi, "SELECT id FROM jenis_produk WHERE nama_produk = '$nama_produk'");
    $databaru = mysqli_fetch_row($query);
    $id_barang = $databaru[0];
    
}
?>


<!-- =================================================== VIEW ================================================ -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Checkout Produk</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Dlight Shop Page</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/dlight3.jpeg"  class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

     <!-- ======= Clients Section ======= -->
     <section id="clients" class="clients clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/brand-logos-bomboogie.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/jeans.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/tommyhilfigerlogo.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/zara.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/nike.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/uniqlo.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>
         
        </div>

      </div>
    </section><!-- End Clients Section -->

 



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <form action="fungsi/proses/proses_checkout.php" method="POST">
      <div class="card shadow mb-4">

                        <div class="card-header py-3">
                        <h2 data-aos="fade-up" data-aos-delay="400">GAMBAR PESANAN</h2>
                        </div>
                        <div class="card-body">
                      
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $p = $koneksi->query("SELECT * FROM jenis_produk WHERE nama_produk = '$nama_produk'");

                                        $no = 1;
                                        while($a = $p->fetch_assoc()) :
                                            ?>
                                            
                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td ><img src="assets/img/portfolio/<?php echo $a['foto'] ?>" width="300" height="300"></td>
                                            
                                            </tr>

                                            
                                        </tbody>
                                        <?php
                                             endwhile;
                                        ?>
                                </table>
                        </div>
                        </div>
                      </div>
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h2 data-aos="fade-up" data-aos-delay="400">DETAIL PESANAN</h2>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Id Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Produk</th>
                                            <th>Ukuran</th>
                                            <th>Harga Produk</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Batas Pembayaran</th>
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $p = $koneksi->query("SELECT * FROM jenis_produk WHERE nama_produk = '$nama_produk'");

                                        $no = 1;
                                        while($a = $p->fetch_assoc()) :
                                            ?>
                                            
                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $id_pemesanan?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $id_pemesanan; ?>" name="id_pemesanan">
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $kode_transaksi; ?>" name="kode_transaksi">
                                            </td>
                                            <td><?php echo $id_barang?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $id_barang; ?>" name="id_barang">
                                            </td>
                                            <td><?php echo $nama_produk ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $nama_produk; ?>" name="nama_produk">
                                            </td>
                                            <td><?php echo $jumlah_produk ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $jumlah_produk?>" name="jumlah_produk">
                                            </td>
                                            <td><?php echo $ukuran_produk ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $jumlah_produk?>" name="ukuran_produk">
                                            </td>
                                            <td>Rp <?php echo format_rupiah($a['harga_produk']) ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $a['harga_produk']; ?>" name="harga_produk">
                                            </td>
                                            
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $a['stock_ukuran']; ?>" name="stock_ukuran">
                                          
                                            <td><?php echo $tgl_pemesanan ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $tgl_pemesanan?>" name="tgl_pemesanan">
                                            </td>
                                            <td><?php echo $nama_customer?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $nama_customer?>" name="nama_customer">
                                            </td>
                                            <td><?php echo $alamat ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $alamat?>" name="alamat">
                                            </td>
                                            <td><?php echo $no_hp ?>
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $no_hp?>" name="no_hp">
                                            </td>

                                            <td><?php echo date('Y-m-d', strtotime('+1 days', strtotime($tgl_pemesanan)));?>
                                            </td>

                                           
                                           
                                            </tr>

                                            
                                        </tbody>
                                </table>
                                <table style="float:right;text-align:left;" width="50%">
                                            <?php
                                                $total_harga = $jumlah_produk*$a['harga_produk'];
                                            ?>
                                    <tr>
                                        <th>Total Harga :</th> 
                                        <td>Rp <?php echo format_rupiah($total_harga) ?> 
                                            <input type="hidden" class="form-control" required readonly value="<?php echo $total_harga?>" name="harga_produk">
                                        </td> 
                                    </tr>

                                        <?php
                                             endwhile;
                                        ?>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">KONFIRMASI PESANAN</button>
                        </div>
                        </form>
                    </div>
            </div>
        

      </div>
    </section><!-- End Portfolio Section -->

   
   
  </main><!-- End #main -->

 <?php
include 'template/footer_customer.php';
 ?>








