<?php
 //session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen
            <small>Kwitansi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Kwitansi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Kwitansi</h3>
              </div>
			        <form class="form-horizontal" action="module/Kwitansi/aksi_simpan.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kwitansi No</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kwitansiNo" name="kwitansiNo" placeholder="Nomor Kwitansi">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Sudah diterima dari</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaClient" name="nama_client" placeholder="Nama Client">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Sejumlah</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="totalHarga" name="totalHarga" placeholder="Total Harga">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Terbilang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="terbilang" name="terbilang" placeholder="Terbilang">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Untuk Pembayaran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="gunaBayar" name="gunaBayar" placeholder="Untuk Pembayaran">
                      </div>
                    </div>


                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
			</div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>
