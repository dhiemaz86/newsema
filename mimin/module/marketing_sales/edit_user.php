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
            <small>User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit User</h3>
              </div>
              <?php
              include "lib/config.php";
              include "lib/koneksi.php";

              $iduser=$_GET['id_user'];
              $queryEdit=mysqli_query($koneksi, "SELECT * FROM cera_user WHERE id_user='$iduser'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
              $nama_user=$hasilQuery['nama_user'];
              $email=$hasilQuery['email_user'];
              $username=$hasilQuery['username_user'];
              $password=$hasilQuery['pass_user'];
              $position=$hasilQuery['position_user'];
              $noHP=$hasilQuery['phone_user'];

              ?>
			        <form class="form-horizontal" action="adminweb.php?module=aksi_edit&id_user=<?php echo $iduser; ?>" method="post">
					    <input type="hidden" name="id_user" value="<?php echo $iduser; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama User</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaUser" name="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>">
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
                      <label for="inputEmail3" class="col-sm-2 control-label">Position</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="<?php echo $position; ?>">
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
