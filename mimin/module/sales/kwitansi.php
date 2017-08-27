<div class="row">
           <div class="col-xs-12">
             <div class="box">
               <div class="box-header">
                 <h3 class="box-title">Data Kwitansi</h3>

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
                     <th>No Kwitansi</th>
                     <th>Nama Client</th>
                     <th>Tanggal</th>
                     <th>Sejumlah</th>
                     <th>Guna Bayar</th>

            <th style="width: 110px">Aksi</th>
                   </tr>
               <?php
               $kueriKategori= mysqli_query($koneksi,"select * from cera_sales JOIN cera_sales_item ON cera_sales.sales_id = cera_sales_item.si_sales_id order by sales_kwitansi_no desc");
               while($kat=mysqli_fetch_array($kueriKategori)){
               ?>
                   <tr>

                     <td><?php echo $kat['sales_kwitansi_no']; ?></td>
                     <td><?php echo $kat['client_name']; ?></td>
                     <td><?php echo $kat['sales_tgl_bayar']; ?></td>
                     <td><?php echo $kat['si_item_name']; ?></td>

           <td>
            <div class="btn-group">

                         <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_kwitansi&id_kwitansi=<?php echo $kat['id_Kwitansi']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                         <a href="<?php echo $admin_url; ?>module/Kwitansi/aksi_hapus.php?id_Kwitansi=<?php echo $kat['id_Kwitansi'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                       </div>
           </td>
                   </tr>
             <?php } ?>
                 </table>
               </div><!-- /.box-body -->

            <div class="box-footer">
       <a href="<?php echo $base_url; ?>adminweb.php?module=tambah_kwitansi"><button class="btn btn-primary">Tambah Kwitansi</button></a>
       <a href="adminweb.php?module=print_kwitansi"><button class="btn btn-primary">Print Kwitansi</button></a>
                 </div><!-- /.box-footer -->
             </div><!-- /.box -->

           </div>
         </div>