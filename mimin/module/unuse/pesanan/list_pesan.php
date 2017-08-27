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
            <small>Pesanan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pesanan</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pesanan</h3>
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
                      <th>ID Pemesanan</th>
                      <th>Nama Pelanggan</th>
					            <th>Alamat</th>
                      <th>Email</th>
                      <th>Status Pembayaran</th>
                      <th>No HP</th>
                      <th>Tanggal Pesan</th>
                      <th>Status</th>
					            <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";

                $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
                $offset = ($page*2);

                $myq = "select pesan.*, pelanggan.*, pesan.nama as pesan_nama, pesan.alamat as pesan_alamat, pesan.email as pesan_email, pesan.no_hp as pesan_no_hp from pesan left join pelanggan on pesan.id_pelanggan = pelanggan.id_pelanggan order by pesan.tgl_pesan desc";

      					$kueriPesan= mysqli_query($koneksi, $myq);
      					while($pro=mysqli_fetch_array($kueriPesan)){
      					?>
                    <tr>
                      <td>#<?php echo $pro['id_pesan']; ?></td>
                      <td><?php echo trim($pro['nama']) === '' ? $pro['pesan_nama'] : $pro['nama']; ?></td>
                      <td><?php echo trim($pro['alamat']) === '' ? $pro['pesan_alamat'] : $pro['alamat']; ?></td>
                      <td><?php echo trim($pro['email']) === '' ? $pro['pesan_email'] : $pro['email']; ?></td>
                      <td><?php echo $pro['status_pembayaran']; ?></td>
                      <td><?php echo trim($pro['no_hp']) === '' ? $pro['pesan_no_hp'] : $pro['no_hp']; ?></td>
                      <td><?php echo $pro['tgl_pesan']; ?></td>
                      <td><?php echo $pro['status_pesan']; ?></td>
					            <td>


                          <!-- Single button -->
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Options <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="javascript::void(0)" data-toggle="modal" data-target="#modal<?php echo $pro['id_pesan'];?>">Details</a></li>
                              <li><a href="<?php echo $admin_url; ?>adminweb.php?module=edit_pesan&id_pesan=<?php echo $pro['id_pesan']; ?>&type=updatePembayaranPaid" >Set Paid</a></li>
                              <li><a href="<?php echo $admin_url; ?>adminweb.php?module=edit_pesan&id_pesan=<?php echo $pro['id_pesan']; ?>&type=updatePembayaranUnpaid">Set Un-Paid</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="<?php echo $admin_url; ?>module/kopi/aksi_hapus.php?id_pesan=<?php echo $pro['id_pesan'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a></li>
                            </ul>
                          </div>

					                <div class="btn-group">
                          
                          
                          
                      </div></td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->

				     <div class="box-footer">
              <a href="<?php echo $base_url; ?>admin/adminweb.php?module=print_pesan"><button class="btn btn-primary">Print</button></a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php

                //$myq = "select jual.*,pelanggan.*,jual.nama as jual_nama,jual.alamat as jual_alamat,jual.email as jual_email,jual.no_hp as jual_no_hp from jual left join pelanggan on jual.id_pelanggan = pelanggan.id_pelanggan order by jual.tgl_jual desc";

                $kueriPesan= mysqli_query($koneksi,$myq);
                while($pro=mysqli_fetch_array($kueriPesan)){

              ?>

                <!-- Modal -->
                <div class="modal fade" id="modal<?php echo $pro['id_pesan'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail dari Pemesanan #<?php echo $pro['id_pesan'];?></h4>
                      </div>
                      <div class="modal-body">

                        <table class="table table-striped">
                          <tr>
                            <td>Nama Product</td>
                            <td>Qty Product</td>
                            <td>Keterangan</td>
                          </tr>
                          <?php 
                            $total = 0;
                            $q = mysqli_query($koneksi,"select * from detail_pesan join kopi on kopi.id_kopi = detail_pesan.id_kopi where detail_pesan.id_pesan = ".$pro['id_pesan']);
                            while($ew = mysqli_fetch_array($q)){
                          ?>
                          <tr>
                            <td><?php echo $ew['nama_kopi'];?></td>
                            <td><?php echo $ew['jumlah'];?></td>
                            <td><?php echo $ew['keterangan'];?></td>
                          </tr>
                          <?php } ?>
                        </table>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Print</button>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

      <?php } ?>
