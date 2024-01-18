<?php

include 'template/header_customer.php';




if($role != 'customer'){
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

      <form action="fungsi/proses/proses_pembayaran.php" method="POST" enctype="multipart/form-data">

      <div class="section-title" data-aos="fade-up">
          <h2>Pembayaran</h2>
          <p>Silahkan Lampirkan Bukti Pembayaran</p>
          <br>
          <p>Pembayaran Bisa Dilakukan Melalui : </p>
          <p>0854753868 (BNI)</p>
          <p>9054889834 (BCA)</p>
          <p>8457674777 (BRI)</p>
        </div>
        

        <div class="form-group">
        <label for="recipient-name" class="col-form-label">Kode Transaksi :</label>
        <input type="text" class="form-control" placeholder="ID" required readonly value="<?= $kode_transaksi ?>" style="width: 500px ;" name="kode_transaksi">
        </div>
        
        <div class="form-group">
              <label for="recipient-name" class="col-form-label">Bukti Pembayaran :</label>
              <input type="file" class="form-control" required="required" style="width: 500px ;" name="bukti_pembayaran">
        </div>

        <div class="modal-footer">
            <button type="Submit" class="btn btn-warning">Lampirkan</button>
        </div>

      </form>

     

      

      </div>
    </section><!-- End Portfolio Section -->

   
    

  </main><!-- End #main -->

 <?php
include 'template/footer_customer.php';
 ?>








