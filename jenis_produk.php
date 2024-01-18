<?php 
require 'config.php';
include 'template/header_admin.php';

$id_produk = $_GET['id_produk'];

$name = $_SESSION['username'];
?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Produk</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="#" type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal<?php echo $id_produk['id_produk']?>">
							<i class="fa fa-plus"></i> Insert Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Stock Ukuran</th>
                                            <th>Ukuran</th>
                                            <th>Bahan</th>
                                            <th>Warna</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th colspan = "2">Aksi</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $p = $koneksi->query("SELECT * FROM jenis_produk WHERE id_produk = '$id_produk'");

                                        $no = 1;
                                        while($a = $p->fetch_assoc()) :
                                            ?>

                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $a['nama_produk'] ?></td>
                                            <td><?php echo $a['stock_ukuran'] ?></td>
                                            <td><?php echo $a['ukuran_produk'] ?></td>
                                            <td><?php echo $a['bahan_produk'] ?></td>
                                            <td><?php echo $a['warna_produk'] ?></td>
                                            <td>Rp <?php echo $a['harga_produk'] ?></td>
                                            <td><img src="assets/img/portfolio/<?php echo $a['foto'] ?>" width="35" height="40"></td>
                                            <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $a['id']; ?>">Ubah</a> |
                                            <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus_admin.php?id=<?=$a['id']?>&id_produk=<?=$a['id_produk'] ?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')">Hapus</a></td>
                                            </tr>

                  

     

                          <div class="modal fade" id="edit<?php echo $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="fungsi/edit/edit_jenisproduk.php" method="POST" enctype="multipart/form-data">

                            <?php
                        $id= $a['id']; 
                        $query_edit = $koneksi->query("SELECT * FROM jenis_produk WHERE id='$id'");

                        while ($row = $query_edit->fetch_assoc()){  
                        ?>

         
                                <input type="hidden" required class="form-control"  value="<?php echo $row['id']; ?>" name="id">
                                <input type="hidden" required class="form-control"  value="<?php echo $row['id_produk']; ?>" name="id_produk">

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Produk :</label>
                                    <input type="text" class="form-control" placeholder="Nama Produk" value="<?php echo $row['nama_produk']; ?>" name="nama_produk">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Stock Ukuran :</label>
                                    <input type="number" class="form-control" placeholder="Stock Ukuran" value="<?php echo $row['stock_ukuran']; ?>" name="stock_ukuran">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ukuran :</label>
                                    <input type="text" class="form-control" placeholder="Ukuran Produk" value="<?php echo $row['ukuran_produk']; ?>" name="ukuran_produk">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Bahan :</label>
                                    <input type="text" class="form-control" placeholder="Bahan" value="<?php echo $row['bahan_produk']; ?>" name="bahan_produk">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Warna :</label>
                                    <input type="text" class="form-control" placeholder="Warna" value="<?php echo $row['warna_produk']; ?>" name="warna_produk">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Harga :</label>
                                    <input type="text" class="form-control" placeholder="Harga" value="<?php echo $row['harga_produk']; ?>" name="harga_produk">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Foto :</label>
                                    <input type="file" class="form-control" placeholder="Warna" name="foto">
                                  </div>
                                
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary">Submit</button>
                        </div>

      <?php 
                        }
                        //mysql_close($host);
                        ?>        

      </form>
    </div>
  </div>
</div>
                                            



                                            <?php
                                            endwhile;
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal<?php echo $id_produk['id_produk']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="fungsi/tambah/tambah_jenisproduk.php" method="POST" enctype="multipart/form-data">


         
         
         <input type="text" required class="form-control"   value="<?php echo $id_produk['id_produk']; ?>" name="id_produk">


         

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Produk :</label>
            <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Stock Ukuran :</label>
            <input type="number" class="form-control" placeholder="Stock Ukuran" name="stock_ukuran">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ukuran :</label>
            <input type="text" class="form-control" placeholder="Ukuran Produk" name="ukuran_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Bahan :</label>
            <input type="text" class="form-control" placeholder="Bahan" name="bahan_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Warna :</label>
            <input type="text" class="form-control" placeholder="Warna" name="warna_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga :</label>
            <input type="text" class="form-control" placeholder="Harga" name="harga_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Foto :</label>
            <input type="file" class="form-control"  required ="required" placeholder="Warna" name="foto">
          </div>
          

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



</div>




<?php 
include 'template/footer_admin.php';
?>
