<?php
 //session_start();
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
            <li class="active">Tambah Pembelian</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Pembelian</h3>
              </div>

                <?php if(!isset($_SESSION['beli']['supplier'])){ ?>

  			        <form class="form-horizontal" action="../admin/module/pembelian/aksi_simpan.php" method="post">
                    <div class="box-body">

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Pilih Supplier</label>
                        <div class="col-sm-10">

                          <select class="form-control" name="id_supplier">
                         <?php
                           include "../lib/config.php";
                           include "../lib/koneksi.php";
                           $kueriKategori= mysqli_query($koneksi,"select * from supplier");
                           while($kat=mysqli_fetch_array($kueriKategori)){
                           ?>
                            <option value="<?php echo $kat['id_supplier']; ?>"><?php echo $kat['nama_supplier']; ?></option>
                            <?php } ?>

                          </select>

                        </div>

                      </div>   

                    </div><!-- /.box-body -->
                    <div class="box-footer">

                      <input type="submit" name="pilih_suplier" class="btn btn-primary pull-right" value="Pilih">
                    </div><!-- /.box-footer -->
                  </form>
                
                <?php } ?>

                <?php if(isset($_SESSION['beli']['supplier'])){ ?>

                <form class="form-horizontal" action="../admin/module/pembelian/aksi_simpan.php" method="post">
                    <div class="box-body">
                    <div class="row">
                      <div class="col-md-4">
                        Supplier : <?php echo $_SESSION['beli']['supplier']['nama_supplier'] ;?><br>
                        Email : <?php echo $_SESSION['beli']['supplier']['email'] ;?>
                      </div>
                    </div>
                    <hr>

                      <div class="row">

                        <div class="col-md-3">
                          <b>Beli ?</b>
                        </div>
                        <div class="col-md-3">
                          <b>Nama ?</b>
                        </div>
                        <div class="col-md-3">
                          <b>Jumlah ?</b>
                        </div>
                        <div class="col-md-3">
                          <b>Harga ?</b>
                        </div>

                      </div>
                    
                     <?php
                       include "../lib/config.php";
                       include "../lib/koneksi.php";
                       $i=0;
                       $kueriKategori= mysqli_query($koneksi,"select * from kopi");
                       while($kat=mysqli_fetch_array($kueriKategori)){
                       ?>
                      <div class="row">
                      
                        <div class="col-md-3">
                          <label>
                            <input type="checkbox" name="pilih[]" value="<?php echo $i; ?>">
                            <input type="hidden" name="id_kopi[]" value="<?php echo $kat['id_kopi']; ?>">
                          </label>
                        </div>
                        <div class="col-md-3">
                          <?php echo $kat['nama_kopi']; ?>
                        </div>
                        <div class="col-md-3">
                          <input type="number" min="1" value="1" name="jumlah[]" required>
                        </div>
                        <div class="col-md-3">
                          <input type="number" min="1" value="<?php echo $kat['harga'];?>" name="price[]" required>
                        </div>

                      </div>

                      <?php $i++; } ?>

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <input type="submit" name="pilih_kembali" class="btn btn-primary pull-left" value="Kembali">
                      <input type="submit" name="pilih_detail" class="btn btn-primary pull-right" value="Pesan">
                    </div><!-- /.box-footer -->
                  </form>
                
                <?php } ?>

			         </div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>
