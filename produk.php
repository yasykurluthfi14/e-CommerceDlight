<?php 
require 'config.php';
include 'template/header_admin.php';
?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Jenis Produk</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori Produk</th>
                                            <th colspan = "2">Aksi</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $p = $koneksi->query("SELECT * FROM produk");

                                        $no = 1;
                                        while($a = $p->fetch_assoc()) :
                                            ?>

                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><a href="jenis_produk.php?id_produk=<?php echo $a['id_produk'] ?>"><?php echo $a['nama_produk'] ?></a></td>
                                            <td><?php echo $a['kategori_produk'] ?></td>
                                            <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $a['id_produk']; ?>">Ubah</a> |
                                            <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus_admin.php?produk=<?=$a['id_produk']?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')">Hapus</a></td>
                                            </tr>









  <div class="modal fade" id="edit<?php echo $a['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="fungsi/edit/edit_produk.php" method="POST">

        <?php
                        $id_produk = $a['id_produk']; 
                        $query_edit = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");

                        while ($row = $query_edit->fetch_assoc()){  
                        ?>

         
            <input type="hidden" required class="form-control"  value="<?php echo $row['id_produk']; ?>" name="id_produk">
  

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Produk :</label>
            <input type="text" required class="form-control" placeholder="Nama Produk" value="<?php echo $row['nama_produk']; ?>" name="nama_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kategori Produk :</label>
            <input type="text" required class="form-control" placeholder="Kategori Produk" value="<?php echo $row['kategori_produk']; ?>" name="kategori_produk">
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


                   
 <!-- Form Tambah Data -->

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="fungsi/tambah/tambah_produk.php" method="POST">

      

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Produk :</label>
            <input type="text" required class="form-control" placeholder="Nama Produk"  name="nama_produk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kategori Produk :</label>
            <input type="text" required class="form-control" placeholder="Kategori Produk"  name="kategori_produk">
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

<!-- End Form Tambah Data -->







</div>




<?php 
include 'template/footer_admin.php';
?>
