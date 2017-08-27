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
            <small>Pembelian</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pembelian</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Data Pembelian</h3>
				          <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button style="display:none" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Nama Supplier</th>
					            <th>Alamat</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th>Tanggal Beli</th>
                      <th>Status</th>
					            <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
                
                $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
                $offset = ($page*2);

      					$kueriBeli= mysqli_query($koneksi,"select * from supplier
join beli on supplier.id_supplier = beli.id_supplier order by beli.tgl_beli desc");
      					while($pro=mysqli_fetch_array($kueriBeli)){
      					?>
                    <tr>
                      <td><?php echo $pro['nama_supplier']; ?></td>
                      <td><?php echo $pro['alamat']; ?></td>
                      <td><?php echo $pro['email']; ?></td>
                      <td><?php echo $pro['no_hp']; ?></td>
                      <td><?php echo $pro['tgl_beli']; ?></td>
                      <td><?php echo $pro['status_beli']; ?></td>
					            <td>
					                <div class="btn-group">
                          <a href="javascript::void(0)" class="btn btn-info" data-toggle="modal" data-target="#modal<?php echo $pro['id_beli'];?>"><i class='fa fa-home'></i></a>
                          <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_beli&id_beli=<?php echo $pro['id_beli']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></a>
                          <a href="<?php echo $admin_url; ?>module/kopi/aksi_hapus.php?id_beli=<?php echo $pro['id_beli'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></a>
                      </div></td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->

				     <div class="box-footer">
				        <a href="<?php echo $base_url; ?>admin/adminweb.php?module=print_beli" class="btn btn-primary">Print</a>
                <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_beli" class="btn btn-primary">Tambah Beli</a>

                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

              <?php
                $kueriBeli= mysqli_query($koneksi,"select * from supplier join beli on supplier.id_supplier = beli.id_supplier order by beli.tgl_beli desc");
                while($pro=mysqli_fetch_array($kueriBeli)){
              ?>

                <!-- Modal -->
                <div class="modal fade" id="modal<?php echo $pro['id_beli'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail dari pembelian #<?php echo $pro['id_beli'];?></h4>
                      </div>
                      <div class="modal-body">

                        <table class="table table-striped">
                          <tr>
                            <td>Nama Product</td>
                            <td>Harga Product</td>
                            <td>Qty Product</td>
                            <td>Total</td>
                          </tr>
                          <?php 
                            $total = 0;
                            $q = mysqli_query($koneksi,"select * from detail_beli join kopi on kopi.id_kopi = detail_beli.id_kopi where detail_beli.id_beli = ".$pro['id_beli']);
                            while($ew = mysqli_fetch_array($q)){
                          ?>
                          <tr>
                            <td><?php echo $ew['nama_kopi'];?></td>
                            <td><?php echo $ew['harga'];?></td>
                            <td><?php echo $ew['jumlah'];?></td>
                            <td><?php echo $ew['harga'] * $ew['jumlah'];?></td>
                          </tr>
                          <?php $total = $total + ($ew['harga'] * $ew['jumlah']); ?>
                          <?php } ?>
                          <tr>
                            <td colspan="3">Grand Total</td>
                            <td><?php echo $total;?></td>
                          </tr>
                        </table>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Print gan ?</button>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

      <?php } ?>
