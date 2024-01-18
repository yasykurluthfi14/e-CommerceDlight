<?php
require 'config.php';
include 'fungsi/fungsi_rupiah.php';
include 'template/header_customer.php';

if($role != 'customer'){
  header("Location: login.php");
  }


?>


<!-- =================================================== VIEW ================================================ -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">History Belanja</h1>
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
     
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h2 data-aos="fade-up" data-aos-delay="400">Transaksi</h2>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>ID</th>
                                            <th>Id Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Tanggal Checkout</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $p = $koneksi->query("SELECT * FROM pemesanan WHERE nama_customer = '$name' AND status_konfirmasi = 'done'");

                                       
                                        $no = 1;
                                        while($a = $p->fetch_assoc()) :
                                    
                                            ?>
                                            
                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $a['kode_transaksi'] ?></td>
                                            <td><?php echo $a['id_pemesanan'] ?></td>
                                            <td><?php echo $a['id_barang'] ?></td>
                                            <td><?php echo $a['nama_produk'] ?></td>
                                            <td><?php echo $a['jumlah_produk'] ?></td>
                                            <td>Rp <?php echo format_rupiah($a['harga_produk'])  ?></td>
                                            <td><?php echo $a['tgl_pemesanan'] ?></td>
                                            <td><?php echo $a['nama_customer'] ?></td>
                                            <td><?php echo $a['alamat'] ?></td>
                                            <td><?php echo $a['no_hp'] ?></td>
                                            <td><?php echo $a['tgl_checkout'] ?></td>
                                            <td><img src="assets/img/bukti_pembayaran/<?php echo $a['foto'] ?>" width="35" height="40"></td>
                                            <td><?php echo $a['status_konfirmasi'] ?></td>

                                            </tr>
                                            
                                            <?php
                                             endwhile;
                                        ?>
                                           
                                        </tbody>
                                        
                                </table>
                               
                               
                        </div>
                    </div>
                    
            </div>

        

      </div>
    </section><!-- End Portfolio Section -->

   
   
  </main><!-- End #main -->

 <?php
include 'template/footer_customer.php';
 ?>








