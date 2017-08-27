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
            <small>Admin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Admin</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Admin</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idAdmin=$_GET['id_admin'];
              $queryEdit=mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$idAdmin'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			        $idAdmin=$hasilQuery['id_admin'];
              $namaAdmin=$hasilQuery['nama_admin'];
              $username=$hasilQuery['username'];
              $password=$hasilQuery['password'];
              $email=$hasilQuery['email'];

              ?>
			        <form class="form-horizontal" action="../admin/module/admin/aksi_edit.php" method="post">
					    <input type="hidden" name="id_admin" value="<?php echo $idAdmin; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Admin</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaAdmin" name="nama_admin" placeholder="Nama Admin" value="<?php echo $namaAdmin; ?>">
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
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
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
