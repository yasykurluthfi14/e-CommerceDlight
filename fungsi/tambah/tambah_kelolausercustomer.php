<?php 
 
include '../../config.php';
 
error_reporting(0);
 
session_start();




if (isset($_POST)) {


	$id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = 'customer';
    $password = md5($_POST['password']);
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    

 
        $sql = "SELECT * FROM login WHERE id='$id'";


        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO login (id, nama, username, role, password, no_hp, alamat)
                    VALUES ('$id','$nama','$username','$role','$password','$no_hp','$alamat')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Tambah data berhasil!')</script>";
                header("Location: ../../kelolauser_customer.php");
				$id = "";
                $nama = "";
                $username = "";
                $role = "";
                $password = "";
                $no_hp = "";
                $alamat = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops!.')</script>";
        }

	
         
   
}






?>
 