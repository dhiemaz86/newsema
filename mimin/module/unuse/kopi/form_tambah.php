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
            <small>Kopi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Kopi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Kopi</h3>
              </div>
			        <form class="form-horizontal" action="../admin/module/kopi/aksi_simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="idKategori">
                                <?php
                include "../lib/koneksi.php";
                $kueriKategori= mysqli_query($koneksi, "select * from kategori");
                while($kat=mysqli_fetch_array($kueriKategori)){
                ?>
                        <option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['nama_kategori']; ?></option>
                  <?php } ?>
                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Kopi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaKopi" name="namaKopi" placeholder="Nama Kopi">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Proses</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="proses" name="proses" placeholder="Proses">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Berat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="berat" name="berat" placeholder="Berat">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="hargaKopi" name="hargaKopi" placeholder="Harga">
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-10">
                      <input type="file" id="gambar" name="gambar">
                      </div>
                    </div>

                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Kopi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsiKopi" name="deskripsiKopi" placeholder="Deskripsi Kopi">
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
