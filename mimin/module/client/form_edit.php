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
            <small>Client</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Client</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Client</h3>
              </div>
              <?php
              include "lib/config.php";
              include "lib/koneksi.php";

              $idClient=$_GET['id_client'];
              $queryEdit=mysqli_query($koneksi, "SELECT * FROM cera_client WHERE id_client='$idClient'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			        $idClient=$hasilQuery['id_client'];
              $namaClient=$hasilQuery['client_name'];
              $alamat=$hasilQuery['address_client'];
              $email=$hasilQuery['email_client'];
              $phoneClient=$hasilQuery['phone_client'];

              ?>
			        <form class="form-horizontal" action="module/client/aksi_edit.php" method="post">
					    <input type="hidden" name="id_client" value="<?php echo $idClient; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Client</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaClient" name="client_name" placeholder="Nama Client" value="<?php echo $namaClient; ?>">
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
                      <label for="inputEmail3" class="col-sm-2 control-label">Telepon/No HP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="phoneClient" name="phone_client" placeholder="Phone" value="<?php echo $phoneClient; ?>">
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
