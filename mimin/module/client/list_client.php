<?php
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
   echo "<center>Untuk mengakses modul, Anda harus login <br>";
   echo "<a href=/index.php><b>LOGIN</b></a></center>";
} else { ?>
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
         <h1>
           Manajemen
           <small>Client</small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Client</li>
         </ol>
       </section>

       <!-- Main content -->
       <section class="content">
         <!-- Info boxes -->
           <div class="row">
           <div class="col-xs-12">
             <div class="box">
               <div class="box-header">
                 <h3 class="box-title">Data Client</h3>

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
                     <th>Client</th>
                     <th>Alamat</th>
                      <th>Email</th>
                      <th>Telepon/HP</th>
                    <th style="width: 110px">Aksi</th>
                   </tr>
               <?php
               include "lib/config.php";
               include "lib/koneksi.php";
               $kueriClient= mysqli_query($koneksi, "select * from cera_client");
               while($kat=mysqli_fetch_array($kueriClient)){
               ?>
                  <tr>
                    <td><?php echo $kat['client_name']; ?></td>
                    <td><?php echo $kat['address_client']; ?></td>
                    <td><?php echo $kat['email_client']; ?></td>
                    <td><?php echo $kat['phone_client']; ?></td>

                    <td><div class="btn-group">
                            <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_client&id_client=<?php echo $kat['id_client']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                            <a href="<?php echo $admin_url; ?>module/client/aksi_hapus.php?id_client=<?php echo $kat['id_client'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                        </div>
                    </td>
                  </tr>
             <?php } ?>
                 </table>
               </div><!-- /.box-body -->

            <div class="box-footer">
            <a href="<?php echo $base_url; ?>adminweb.php?module=tambah_client"><button class="btn btn-primary">Tambah Client</button></a>
                 </div><!-- /.box-footer -->
             </div><!-- /.box -->

           </div>
         </div>
       </section><!-- /.content -->
     </div><!-- /.content-wrapper -->
     <?php } ?>
