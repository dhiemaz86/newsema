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
            <small>Penjualan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Penjualan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Penjualan</h3>
              </div>
			        <form class="form-horizontal" action="../admin/module/penjualan/aksi_simpan.php" method="post" enctype="multipart/form-data">
                  
                    <div class="box-body">
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelanggan</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="id_pelanggan">
                                <?php
                include "../lib/koneksi.php";
                $kueriPelanggan= mysql_query("select * from pelanggan");
                $kueriAlamat = mysql_query("select alamat from pelanggan where nama = $nama");
                while($kat=mysql_fetch_array($kueriPelanggan)){
                ?>
                        <option value="<?php echo $kat['id_pelanggan']; ?>"><?php echo $kat['nama']; ?></option>
                  <?php } ?>
                      </select>
                    </div>
                    </div>


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?php echo $kat['alamat']; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="noHP" name="no_hp" placeholder="No HP">
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Jual</label>
                      <div class="col-sm-10">
                      <input type="date" id="tglJual" name="tgl_jual">
                      </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Kopi</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="id_kopi">
                                <?php
                include "../lib/koneksi.php";
                $kueriKopi= mysql_query("select * from kopi");
                while($kat=mysql_fetch_array($kueriKopi)){
                ?>
                        <option value="<?php echo $kat['id_kopi']; ?>"><?php echo $kat['nama_kopi']; ?></option>
                  <?php } ?>
                      </select>
                    </div>
                    </div>


                     <div class="box-body">
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="id_kopi">
                                <?php
                include "../lib/koneksi.php";
                $kueriKopi= mysql_query("select * from kopi");
                while($kat=mysql_fetch_array($kueriKopi)){
                ?>
                        <option value="<?php echo $kat['id_kopi']; ?>"><?php echo $kat['harga']; ?></option>
                  <?php } ?>
                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Subtotal</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Total</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="total" name="total" placeholder="Total">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="status" name="status" placeholder="status">
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
