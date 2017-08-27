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
                  <h3 class="box-title">Form Edit Kopi</h3>
              </div>
			            <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idKopi=$_GET['id_kopi'];
              $queryEdit=mysqli_query($koneksi,"SELECT * FROM kopi WHERE id_kopi='$idKopi'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
              $namaKopi=$hasilQuery['nama_kopi'];
              $idKopi=$hasilQuery['id_kopi'];
              $proses=$hasilQuery['proses'];
              $berat=$hasilQuery['berat'];
              $stok=$hasilQuery['stok'];
              $harga=$hasilQuery['harga'];
              $gambar=$hasilQuery['gambar'];
              $deskripsi=$hasilQuery['deskripsi'];
              ?>
			        <form class="form-horizontal" action="../admin/module/kopi/aksi_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kopi" value="<?php echo $idKopi; ?>">
				 <div class="box-body">

                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">

                      <select class="form-control" name="idKategori">
                                <?php
                include "../lib/config.php";
                include "../lib/koneksi.php";
                $kueriKategori= mysqli_query($koneksi,"select * from kategori");
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
                        <input type="text" class="form-control" id="namaKopi" name="nama_kopi" placeholder="Nama Kopi" value="<?php echo $namaKopi; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Proses</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="proses" name="proses" placeholder="Proses" value="<?php echo $proses; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Berat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="berat" name="berat" placeholder="Berat" value="<?php echo $berat; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?php echo $stok; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="hargaKopi" name="harga" placeholder="Harga" value="<?php echo $harga; ?>">
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
                      <textarea class="form-control" id="deskripsiKopi" name="deskripsi" placeholder="Deskripsi Kopi"><?php echo $deskripsi; ?></textarea>
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
