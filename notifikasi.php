<?php

include 'template/header_customer.php';


if (!isset($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Dahulu.')</script>";
  header("Location: login.php");
}

$kode_transaksi = $_GET['kode_transaksi'];
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


      <div class="section-title" data-aos="fade-up">
          <h2>PEMBAYARAN SELESAI</h2>
          <p>KODE TRANSAKSI : <?=$kode_transaksi?></p>
          <p>Pesananmu sedang diproses</p>
        </div>



        

     

      

      </div>
    </section><!-- End Portfolio Section -->

   
    

  </main><!-- End #main -->

 <?php
include 'template/footer_customer.php';
 ?>








