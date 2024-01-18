<?php
include 'config.php';


include 'template/header_customer.php';

if($role != 'customer'){
  header("Location: login.php");
  }

$nama_produk = $_GET['produk'];
$hari_ini = date('Y-m-d');



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
          <h2>Beli Produk</h2>
          <p>Produk Catalog</p>
        </div>

        

     
 <!-- ======= Tabel Beli Produk ======= -->
        <div class="container" data-aos="fade-up" data-aos-delay="400">
        <form action="checkout.php" method="POST">

        <?php          
          $sql= mysqli_query($koneksi ,"SELECT max(id_pemesanan) from pemesanan ");
          $databaru = mysqli_fetch_row($sql);
          $urut = $databaru[0] + 1;
        ?>


          <div class="form-group">
            <input type="hidden" readonly class="form-control" value="<?php echo $urut ?>" name="id_pemesanan">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Produk :</label>
            <input type="text" class="form-control" required readonly value="<?php echo $nama_produk ?>" name="nama_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jumlah :</label>
            <input type="number" class="form-control" placeholder="Jumlah" name="jumlah_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Pemesanan :</label>
            <input type="text" class="form-control" required readonly value="<?php echo $hari_ini ?>" name="tgl_pemesanan">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ukuran :</label>
            <select name="ukuran_produk" class="form-control">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
            <input type="text" class="form-control"  required readonly value="<?= $name ?>"name="nama_customer">
          
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alamat :</label>
            <textarea type="text" class="form-control" placeholder="Alamat" name="alamat"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">No. HP</label>
            <input type="text" class="form-control" placeholder="No. HP" name="no_hp">
          </div>
          
          
              
          <div class="modal-footer">
            <button type="Submit" class="btn btn-primary">Buy Now</button>
          </div>

        </form>

         <!-- ======= End Tabel Beli Produk ======= -->
       
        </div>
      

      </div>
    </section><!-- End Portfolio Section -->

   
    

  </main><!-- End #main -->

 <?php
include 'template/footer_customer.php';
 ?>








