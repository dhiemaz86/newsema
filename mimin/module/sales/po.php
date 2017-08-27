<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Purchase Order</h3>
          <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="hidden" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button style="display:none" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Tanggal PO</th>
                      <th>Client</th>
                      <th>Cargo</th>
                      <th>Packing</th>
                      <th>Nama Cargo</th>
                      <th>Jumlah Koli</th>         
                      <th>Harga</th>
                      <th>Total</th>
                      <th>Tanggal Kirim</th>
                      <th style="width: 110px">Aksi</th>
                    </tr>
                <?php

                $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
                $offset = ($page*2);

                $myq = "select * from cera_sales_item JOIN cera_sales ON cera_sales.sales_id = cera_sales_item.si_sales_id JOIN cera_delivery ON cera_sales.sales_id_delivery = cera_delivery.delivery_id order by sales_tgl_po desc";

                $kueriJual= mysqli_query($koneksi,$myq);
                while($pro=mysqli_fetch_array($kueriJual)){
                ?>
                    <tr>
                      <td><?php echo $pro['sales_tgl_po'];?></td>
                      <td><?php echo $pro['client_name']; ?></td>
                      <td><?php echo $pro['cargo']; ?></td>
                      <td><?php echo $pro['cargo_name']; ?></td>
                      <td><?php echo $pro['koli_qty']; ?></td>
                      <td><?php echo $pro['price_cargo']; ?></td>
                      <td><?php echo $pro['koli_qty'] * $pro['price_cargo']?></td>
                      <td><?php echo $pro['shipping_time']; ?></td>
                      <td>
                          <div class="btn-group">
                          <a href="javascript::void(0)" class="btn btn-info" data-toggle="modal" data-target="#modal<?php echo $pro['id_jual'];?>"><i class='fa fa-home'></i></a>
                          <a href="<?php echo $admin_url; ?>module/Purchase Order/edit_status.php?id_jual=<?php echo $pro['id_jual']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></a>
                          <a href="<?php echo $admin_url; ?>module/Purchase Order/aksi_hapus.php?id_jual=<?php echo $pro['id_jual'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></a>
                      </div></td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->

             <div class="box-footer">
             <a href="<?php echo $base_url; ?>adminweb.php?module=tambah_po"><button class="btn btn-primary">Tambah PO</button></a>
             <a href="adminweb.php?module=print_po"><button class="btn btn-primary">Print</button></a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>