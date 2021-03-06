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
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data User</h3>

				  <div class="box-tools">

                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>

                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Nama Sales</th>                  
                      <th>Email</th>
                      <th>Jabatan</th>
                      <th>No HP</th>
					            <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "lib/config.php";
      					include "lib/koneksi.php";
      					$kueriUser= mysqli_query($koneksi,"select * from cera_user order by id_user asc");
      					while($mem=mysqli_fetch_array($kueriUser)){
      					?>
                    <tr>

                      <td><?php echo $mem['id_user']; ?></td>
                      <td><?php echo $mem['nama_user']; ?></td>
                      <td><?php echo $mem['email_user']; ?></td>
                      <td><?php echo $mem['position_user']; ?></td>
                      <td><?php echo $mem['phone_user']; ?></td>
					  <td>
					   <div class="btn-group">

                          <a href="adminweb.php?module=edit_user&id_user=<?php echo $mem['id_user']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                          <a href="adminweb.php?module=hapus_user&id_user=<?php echo $mem['id_user'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                        </div>
					  </td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body-->

                <div class="box-footer">
                  <a href="adminweb.php?module=tambah_user"><button class="btn btn-primary">Tambah User</button></a>
                  <a href="adminweb.php?module=print_user"><button class="btn btn-primary">Print User</button></a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>
