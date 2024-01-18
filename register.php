<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = 'customer';
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE nama='$nama'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO login (nama, username, role, password, no_hp, alamat)
                    VALUES ('$nama', '$username','$role','$password','$no_hp','$alamat')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                header("Location: login.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 



<!DOCTYPE html>

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
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

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
            <form action ="" method ="POST">
              <div class="form-floating mb-3">
                <input type="text"required class="form-control" id="floatingInput" placeholder="Nama" name="nama" >
                <label for="floatingInput">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" required class="form-control" id="floatingInput" placeholder="Username" name="username" >
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" required class="form-control" id="floatingPassword" placeholder="Password" name="password" >
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" required class="form-control" id="floatingPassword" placeholder="Confirm Password" name="cpassword" >
                <label for="floatingPassword">Confirm Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" required class="form-control" id="floatingInput" placeholder="No. Hp" name="no_hp" >
                <label for="floatingInput">No. Hp</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" required class="form-control" id="floatingInput" placeholder="alamat" name="alamat" >
                <label for="floatingInput">Alamat</label>
              </div>

              
              <div class="d-grid">
                
                  <button name="submit" class="btn btn-primary btn-login text-uppercase fw-bold" >Register</button>
              </div>
            
              <hr class="my-4">
              <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
