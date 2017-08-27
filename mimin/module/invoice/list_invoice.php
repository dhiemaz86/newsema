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
            <small>Invoice</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Invoice</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Invoice</h3>

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
                      <th>Invoice No</th>
                      <th>Nama Client</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th>Tanggal</th>
                      <th>Status</th>
					            <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "lib/config.php";
      					include "lib/koneksi.php";
      					$kueriInvoice= mysqli_query($koneksi,"select * from cera_sales JOIN cera_sales_item ON cera_sales.sales_id = cera_sales_item.si_sales_id order by sales_invoice_no desc");
      					while($mem=mysqli_fetch_array($kueriInvoice)){
      					?>
                    <tr>

                      <td><?php echo $mem['nama']; ?></td>
                      <td><?php echo $mem['username']; ?></td>
                      <td><?php echo $mem['password']; ?></td>
                      <td><?php echo $mem['email']; ?></td>
                      <td><?php echo $mem['alamat']; ?></td>
                      <td><?php echo $mem['no_hp']; ?></td>
                      <td><?php echo $mem['no_hp']; ?></td>

					  <td>
					   <div class="btn-group">

                          <a href="adminweb.php?module=edit_Invoice&id_Invoice=<?php echo $mem['id_Invoice']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                          <a href="module/Invoice/aksi_hapus.php?id_Invoice=<?php echo $mem['id_Invoice'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                        </div>
					  </td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <a href="adminweb.php?module=tambah_invoice"><button class="btn btn-primary">Tambah Invoice</button></a>
                  <a href="adminweb.php?module=print_invoice"><button class="btn btn-primary">Print Invoice</button></a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>
