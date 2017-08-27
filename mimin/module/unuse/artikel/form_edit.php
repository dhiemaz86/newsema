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
            <small>Artikel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Artikel</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Artikel</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idArtikel=$_GET['id_artikel'];
              $queryEdit=mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$idArtikel'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			       $idArtikel=$hasilQuery['id_artikel'];
              $judul=$hasilQuery['judul'];
              $artikel=$hasilQuery['isi'];

              ?>
			        <form class="form-horizontal" action="../admin/module/artikel/aksi_edit.php" method="post">
					<input type="hidden" name="id_artikel" value="<?php echo $idArtikel; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Judul Artikel</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" value="<?php echo $judul; ?>">
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Isi</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="artikel" name="artikel" placeholder="Isi"><?php echo $artikel; ?>"></textarea>
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
