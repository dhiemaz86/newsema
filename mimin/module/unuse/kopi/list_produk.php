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
            <small>Kopi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kopi</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kopi</h3>
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
                      <th>Kopi</th>
                      <th>Proses</th>
                      <th>Kategori</th>
                      <th>Berat</th>
					            <th>Stok</th>
                      <th>Harga</th>
                      <th>Gambar</th>
                      <th>Deskripsi</th>
					            <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
      					$kueriKopi= mysqli_query($koneksi,"select id_kopi, nama_kopi, proses, nama_kategori, berat, stok, harga, gambar, deskripsi from kopi join kategori on kopi.id_kategori = kategori.id_kategori");
      					while($pro=mysqli_fetch_array($kueriKopi)){
      					?>
                    <tr>

                      <td><?php echo $pro['nama_kopi']; ?></td>
                      <td><?php echo $pro['proses']; ?></td>
                      <td><?php echo $pro['nama_kategori']; ?></td>
                      <td><?php echo $pro['berat']; ?></td>
                      <td><?php echo $pro['stok']; ?></td>
                      <td><?php echo $pro['harga']; ?></td>
                     
					            <td><img src="upload/<?php echo $pro['gambar'];?>" height="100" width="150"></td>
                       <td><?php echo $pro['deskripsi']; ?></td>
					            <td>
					                <div class="btn-group">
                          <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_produk&id_kopi=<?php echo $pro['id_kopi']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                          <a href="<?php echo $admin_url; ?>module/kopi/aksi_hapus.php?id_kopi=<?php echo $pro['id_kopi'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                      </div></td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->

				     <div class="box-footer">
				<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_produk"><button class="btn btn-primary">Tambah Produk</button></a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>
