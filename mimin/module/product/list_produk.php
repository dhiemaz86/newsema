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
            <small>Products</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  
                  <h3 class="box-title">Data Products (Parent)</h3>
                  <div>
                  <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#new" aria-expanded="false" aria-controls="collapseExample">
                    New Product
                  </button><br>
                  </div>
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


                <!--mulai collapse-->
                <div class="collapse" id="new">
                  <div class="well">

                      <form class="form-horizontal" action="module/product/aksi_simpan.php" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                              
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Kode Produk</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodeProduk" name="kodeProduk" placeholder="Kode Produk">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                              <div class="col-sm-10">
                              <select class="form-control" name="idKategori">
                              
                                <?php
                                  include "lib/koneksi.php";
                                  $kueriKategori= mysqli_query($koneksi, "select * from cera_product_category");
                                  while($kat=mysqli_fetch_array($kueriKategori)){
                                ?>
                                    <option value="<?php echo $kat['pc_id']; ?>"><?php echo $kat['pc_name']; ?></option>
                                <?php } ?>
                              
                              </select>
                            </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Nama Produk">
                              </div>
                            </div>

                             <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Produk</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsiProduk" name="deskripsiProduk" placeholder="Deskripsi Produk"></textarea>
                              </div>
                            </div>

                              <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                              <div class="col-sm-10">
                              <input type="file" id="gambar" name="gambar">
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

                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Total Product Child</th>
                      <th>Options</th>
                    </tr>
                <?php
                include "lib/koneksi.php";
                $i = 1;
                      $products = "select * from cera_product where product_status = 'active' and product_type = 'parent' ";
                      $products = mysqli_query($koneksi,$products);

                      while($data=mysqli_fetch_array($products)) {
                        
                        $childs = "select * from cera_product where product_parent_id".$data['id_product'];
                        $childs = mysqli_query($koneksi,$childs);

                ?>
                    <tr>

                      <td><?php echo $i; ?></td>
                        <td><?php echo $data['product_name']; ?></td>
                        <td><?php echo @count(mysqli_fetch_array($childs)); ?> </td>
                        <td>
                        <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Options
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="dLabel" aria-labelledby="drop6"> 
                              <li><a href="<?php echo $admin_url; ?>adminweb.php?module=child_home&id=<?php echo $data['id_product']; ?>">Child Management</a></li> 
                              <li><a href="javascript::void(0)" data-toggle="modal" data-target="#editParent<?php echo $data['id_product']; ?>">Edit</a></li> 
                              <li role="separator" class="divider"></li> 
                              <li><a href="<?php echo $admin_url; ?>module/product/aksi_hapus.php?id_product=<?php echo $data['id_product'];?>">Delete</a></li> 
                            </ul>
                          </div>
                        </td>
                      
                    </tr>
                    <?php
                    $i++;
               } ?>
                  </table>

              </div>
              <!-- selesai collapse-->

                </div><!-- /col -->
              </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php
        $i = 1;
        $products = "select * from cera_product where product_status = 'active' and product_type = 'parent' ";
        $products = mysqli_query($koneksi,$products);

        while($data=mysqli_fetch_array($products)){
          
          $childs = "select * from cera_product where product_parent_id".$data['id_product'];
          $childs = mysqli_query($koneksi,$childs);

?>
                    
<!-- Modal -->
        <div class="modal fade" id="editParent<?php echo $data['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit in Product Parent <?php echo $data['product_name'];?></h4>
              </div>

              <div class="modal-body">              

                      <form class="form-horizontal" action="module/product/aksi_edit.php" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                              
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Kode Produk</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodeProduk" name="kodeProduk" placeholder="Kode Produk" value="<?php echo $data['product_code']?>">
                                <input type="hidden" name="id_product" value="<?php echo $data['id_product'];?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                              <div class="col-sm-10">
                              <select class="form-control" name="idKategori">
                              
                                <?php
                                  $kueriKategori= mysqli_query($koneksi, "select * from cera_product_category");
                                  while($kat=mysqli_fetch_array($kueriKategori)){
                                ?>
                                    <option value="<?php echo $kat['pc_id']; ?>"><?php echo $kat['pc_name']; ?></option>
                                <?php } ?>
                              
                              </select>
                            </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Nama Produk" value="<?php echo $data['product_name']; ?>">
                              </div>
                            </div>

                             <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Produk</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsiProduk" name="deskripsiProduk" placeholder="Deskripsi Produk"><?php echo $data['product_desc']; ?></textarea>
                              </div>
                            </div>

                              <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                              <div class="col-sm-10">
                              <img src="upload/<?php echo $data['product_img']; ?>" class="img-responsive">
                              <input type="file" id="gambar" name="gambar">
                              </div>
                            </div>
                             
                          </div><!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                          </div><!-- /.box-footer -->
                        </form>

                    </div>
                  </div>

              </div>

            </div>
          <?php } ?>

      <?php
        }
      ?>
