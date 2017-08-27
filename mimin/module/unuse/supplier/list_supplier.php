<?php
// session_start();
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
           <li class="active">Supplier</li>
         </ol>
       </section>

       <!-- Main content -->
       <section class="content">
         <!-- Info boxes -->
           <div class="row">
           <div class="col-xs-12">
             <div class="box">
               <div class="box-header">
                 <h3 class="box-title">Data Supplier</h3>

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
                     <th>Nama Supplier</th>
                     <th>Alamat</th>
                     <th>Email</th>
                     <th>No HP</th>

            <th style="width: 110px">Aksi</th>
                   </tr>
               <?php
               include "../lib/config.php";
               include "../lib/koneksi.php";
               $kueriKategori= mysqli_query($koneksi,"select * from supplier");
               while($kat=mysqli_fetch_array($kueriKategori)){
               ?>
                   <tr>

                     <td><?php echo $kat['nama_supplier']; ?></td>
                     <td><?php echo $kat['alamat']; ?></td>
                     <td><?php echo $kat['email']; ?></td>
                     <td><?php echo $kat['no_hp']; ?></td>

           <td>
            <div class="btn-group">

                         <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_supplier&id_supplier=<?php echo $kat['id_supplier']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                         <a href="<?php echo $admin_url; ?>module/supplier/aksi_hapus.php?id_supplier=<?php echo $kat['id_supplier'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                       </div>
           </td>
                   </tr>
             <?php } ?>
                 </table>
               </div><!-- /.box-body -->

            <div class="box-footer">
       <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_supplier"><button class="btn btn-primary">Tambah Supplier</button></a>
       <a href="<?php echo $base_url; ?>admin/adminweb.php?module=print_supplier"><button class="btn btn-primary">Print Supplier</button></a>
                 </div><!-- /.box-footer -->
             </div><!-- /.box -->

           </div>
         </div>
       </section><!-- /.content -->
     </div><!-- /.content-wrapper -->
     <?php } ?>
