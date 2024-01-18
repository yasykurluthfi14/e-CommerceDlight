<?php
require 'config.php';
include 'template/header_customer.php';
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Welcome <?php echo $name?> </h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Dlight Shop Page</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/shop.jpg"  class="img-fluid animated" alt="">
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

        <div class="section-title" data-aos="fade-up">
          <h2>Produk</h2>
          <p>Produk-produk yang dijual</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Hoodie</li>
              <li data-filter=".filter-card">T-Shirt</li>
              <li data-filter=".filter-web">Celana</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/375088173_WhatsApp Image 2022-06-20 at 18.47.47 (1).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Boombogie Hoodie'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>Hoodie | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 250.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div> 

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/1946494103_WhatsApp Image 2022-06-20 at 18.46.27 (3).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Oxyman'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>Jeans | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 300.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/1046456206_WhatsApp Image 2022-06-20 at 18.47.47.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
               <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Boombogie Denim'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>Hoodie | Stok Barang : <?= $stock ?></p>
                <p>Rp 250.000</p>
                
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/237445580_WhatsApp Image 2022-06-20 at 18.47.01 (1).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
               <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Beast Mode'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>T-Shirt | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 150.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                 
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/164349053_WhatsApp Image 2022-06-20 at 18.46.27 (4).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Slim fit Denim Abu-abu'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>Celana | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 300.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/1418210241_WhatsApp Image 2022-06-20 at 18.46.27 (2).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Jeans'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>Jeans | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 300.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/1602518660_WhatsApp Image 2022-06-20 at 18.47.01 (2).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Nike T-Shirt'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>T-Shirt | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 150.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/280195361_WhatsApp Image 2022-06-20 at 18.47.01.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'All is Well T-Shirt'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>T-Shirt | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 150.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/1811027770_WhatsApp Image 2022-06-20 at 18.46.27 (5).jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
              <?php
                 $query    = mysqli_query($koneksi, "SELECT nama_produk , stock_ukuran FROM jenis_produk WHERE nama_produk = 'Slim fit Denim'");
                 $databaru = mysqli_fetch_row($query);
                 $nama_produk = $databaru[0];
                 $stock = $databaru [1];
              ?>
                <h4><?= $nama_produk ?></h4>
                <p>Celana | Stok Barang : <?= $stock ?></p></p>
                <p>Rp 300.000</p>
                <div class="portfolio-links">
                  <a href="cart.php?produk=<?=$nama_produk?>"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

   

   
   

  </main><!-- End #main -->

 <?php
include 'template/footer_customer.php';
 ?>