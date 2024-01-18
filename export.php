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
                    <div class="card-header py-3">
                      
                    </div>
                       
      <div class="card-body">
        <form  class="form-horizontal" method="GET" action="cetaklaporan.php" target="_blank">
          <div class="box-body">

            <div class="form-group">
              <label class="col-sm-1">Hari</label>
              <div class="col-sm-2">
              <select name="hari" class="form-control date-picker" style="width:130%" >
	              <option value="">--- Pilih Tanggal ---</option>
	              <option value="1">1</option>
	              <option value="2">2</option>
	              <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
	              <option value="12">12</option>
	              <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
	              <option value="22">22</option>
	              <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-1">Bulan</label>
              <div class="col-sm-2">
              <select name="bulan" class="form-control date-picker" style="width:130%" >
	              <option value="">--- Pilih Bulan ---</option>
	              <option value="01">Januari</option>
	              <option value="02">Februari</option>
	              <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
	              <option value="12">Desember</option>
	              
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-1">Tahun</label>
              <div class="col-sm-2">
              <select name="tahun" class="form-control date-picker" style="width:130%" >
	              <option value="">--- Pilih Tahun ---</option>
	              <option value="2020">2020</option>
	              <option value="2021">2021</option>
	              <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
               
	              
              </select>
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit">
                  <i class="fa fa-print"></i> Cetak
                </button>
              </div>
            </div>
          </div>
        </form>
                        </div>
                    </div>

</div>

<?php
          include 'template/footer_admin.php';
          ?>