<?php 
require 'config.php';
include 'template/header_admin.php';


?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

<div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kode Transaksi</th>
                                            <th>Jumlah Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Tanggal Checkout</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $p = $koneksi->query("SELECT * FROM pemesanan WHERE status_konfirmasi = 'Done'");

                                        $no = 1;
                                        while($a = $p->fetch_assoc()) :
                                            ?>

                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $a['nama_produk'] ?></td>
                                            <td><?php echo $a['kode_transaksi'] ?></td>
                                            <td><?php echo $a['jumlah_produk'] ?></td>
                                            <td><?php echo $a['harga_produk'] ?></td>
                                            <td><?php echo $a['tgl_pemesanan'] ?></td>
                                            <td><?php echo $a['nama_customer'] ?></td>
                                            <td><?php echo $a['alamat'] ?></td>
                                            <td><?php echo $a['no_hp'] ?></td>
                                            <td><?php echo $a['tgl_checkout'] ?></td>
                                            <td><img src="assets/img/bukti_pembayaran/<?php echo $a['bukti_pembayaran'] ?>" width="35" height="40"></td>
                                            <td> 
                                            <a type="button"class="btn btn-primary" data-toggle="modal"data-target="#exampleModal<?php echo $a['id_pemesanan']; ?>">View</a>
                                            <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus_admin.php?pemesanan=<?=$a['id_pemesanan']?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')">Hapus</a></td>
                                            </tr>

                                            

                                            <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo $a['id_pemesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         
         <div class="modal-dialog" role="document">
             <div class="modal-content">
              
                 <!-- Add image inside the body of modal -->
                 
                     <img id="image" src= "assets/img/bukti_pembayaran/<?php echo $a['bukti_pembayaran']; ?>" alt="Click on button" />
                
  
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">
                         Close
                 </button>
                 </div>
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

</div>




<?php 
include 'template/footer_admin.php';
?>
