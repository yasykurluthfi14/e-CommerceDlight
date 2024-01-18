<?php 
 
 include 'config.php';
  
 error_reporting(0);
  
 session_start();
  
 
  
 if (isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = md5($_POST['password']);
  
     $sql = "SELECT * FROM login WHERE username ='$username' AND password ='$password'";
     
     $result = mysqli_query($koneksi, $sql);
     


     if ($result->num_rows > 0 ) {
         $row = mysqli_fetch_assoc($result);
        

    

      if ($row['role']=="admin" ){
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("location: dashboard_admin.php");

      } 
      else if ($row['role'] == "customer"){
        $_SESSION['id'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("location: dashboard_customer.php");
      }

         
     } else {
         echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
     }
 }
  
 ?>


<!DOCTYPE html>

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="assets1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets1/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-3">Toko Dlight</h5>
            <form action="" method="POST">
              <div class="form-floating mb-3">
                <input type="text" required class="form-control" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" required class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="submit">Login</button>
                  <br>
                  <a class="btn btn-primary btn-login text-uppercase fw-bold" href = "register.php">Register</a>
              </div>

              <hr class="my-4">
              <div class="d-grid mb-2">
               

                
              </div>
              
            </form>
            <a class="btn btn-danger btn-login text-uppercase fw-bold" href = "index.php">Balik</a>
          </div>
          
        </div>
        
      </div>
    </div>i
  </div>

  <script src="assets1/vendor/jquery/jquery.min.js"></script>
    <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets1/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets1/js/sb-admin-2.min.js"></script>


</body>

</html>








