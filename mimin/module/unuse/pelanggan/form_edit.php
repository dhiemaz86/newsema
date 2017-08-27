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
            <small>Pelanggan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Pelanggan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Pelanggan</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idPelanggan=$_GET['id_pelanggan'];
              $queryEdit=mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$idPelanggan'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			        $idPelanggan=$hasilQuery['id_pelanggan'];
              $namaPelanggan=$hasilQuery['nama'];
              $username=$hasilQuery['username'];
              $password=$hasilQuery['password'];
              $email=$hasilQuery['email'];
              $alamat=$hasilQuery['alamat'];
              $noHP=$hasilQuery['no_hp'];

              ?>
			        <form class="form-horizontal" action="../admin/module/pelanggan/aksi_edit.php" method="post">
					    <input type="hidden" name="id_pelanggan" value="<?php echo $idPelanggan; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelanggan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaPelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $namaPelanggan; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="noHP" name="no_hp" placeholder="No HP" value="<?php echo $noHP;?>">
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
