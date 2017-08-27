<?php

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
            <small>Supplier</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Supplier</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Supplier</h3>
              </div>
                  <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idSupplier=$_GET['id_supplier'];
              $queryEdit=mysqli_query($koneksi,"SELECT * FROM supplier WHERE id_supplier='$idSupplier'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
              $namaSupplier=$hasilQuery['nama_supplier'];
              $idSupplier=$hasilQuery['id_supplier'];
              $alamat=$hasilQuery['alamat'];
              $email=$hasilQuery['email'];
              $noHP=$hasilQuery['no_hp'];
              ?>
              <form class="form-horizontal" action="../admin/module/supplier/aksi_edit.php" method="post">
              <input type="hidden" name="idsup" value="<?php echo $idSupplier?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Supplier</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaSupplier" name="nama_supplier" placeholder="Nama Supplier" value="<?php echo $namaSupplier; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="<?php echo $noHP; ?>">
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
