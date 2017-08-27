 <?php
 //session_start();
include "lib/koneksi.php";

$data = "select * from cera_product where id_product = ".$_GET['id'];
$data = mysqli_query($koneksi,$data);

$data = mysqli_fetch_array($data);

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { ?>
  <style type="text/css">
        .hide{
          display: none;
        }
        .show{
          display:block;
        }
      </style>

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
                  <h3 class="box-title">Data Products (Child)</h3>
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
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#new" aria-expanded="false" aria-controls="collapseExample">
                  New Product
                </button>
                <!--mulai collapse-->
                <div class="collapse" id="new">
                  <div class="well">

                      <form class="form-horizontal" action="module/product/aksi_simpan.php" method="post" enctype="multipart/form-data">
                          
                          <div class="box-body">

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Kode Produk</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodeProduk" name="kodeProduk" placeholder="Kode Produk">
                                <input type="hidden" class="form-control" name="product_parent_id" value="<?php echo $data['id_product'];?>">
                                <input type="hidden" class="form-control" name="idKategori" value="<?php echo $data['product_pc_id'];?>">
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
                              <input type="file" name="gambar">
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

              </div>
              <!-- selesai collapse-->
                
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>Options</th>
                    </tr>
      					<?php
                include "lib/koneksi.php";
      					 $y = 1;

                      $childs = "select * from cera_product where product_status = 'active' and product_parent_id =".$data['id_product'];
                      $childs = mysqli_query($koneksi,$childs);

                      while($child=mysqli_fetch_array($childs)) {

                    ?>
                    <tr>
                        <td><?php echo $y; ?></td>
                        <td><?php echo $child['product_name']; ?></td>
                        <td># </td>
                        <td>#</td>
                        <td>

                          <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Options
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="dLabel" aria-labelledby="drop6"> 
                              <li><a href="#" data-toggle="modal" data-target="#price<?php echo $child['id_product']; ?>">Price Management</a></li> 
                              <li><a href="#">Edit</a></li> 
                              <li role="separator" class="divider"></li> 
                              <li><a href="<?php echo $admin_url; ?>module/product/aksi_hapus.php?id_product=<?php echo $child['id_product'];?>">Delete</a></li> 
                            </ul>

        
                          </div>

                        </td>
                      </tr>
              <?php 
                $y++;
              } 
              ?>
                  </table>
                </div><!-- /.box-body -->

				     <div class="box-footer">

				      

                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>

 <?php

        $childs = "select * from cera_product where product_status = 'active' and product_parent_id =".$data['id_product'];
        $childs = mysqli_query($koneksi,$childs);

        while($data = mysqli_fetch_array($childs)){

      ?>

       <!-- Modal -->
        <div class="modal fade" id="price<?php echo $data['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Price Management in Product <?php echo $data['product_name'];?></h4>
              </div>
              <div class="modal-body">

                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#newChild<?php echo $data['id_product'];?>" aria-expanded="false" aria-controls="collapseExample">
                    New Price
                  </button>
                  <div class="collapse" id="newChild<?php echo $data['id_product'];?>">
                    <div class="well">
                      
                      <form class="form-horizontal" id="formNew" action="module/product/aksi_simpan_price.php" method="post" >
                        
                        <div class="box-body">

                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="qty" name="qty" placeholder="Jumlah">
                              <input type="hidden" class="form-control" name="product_id" value="<?php echo $data['id_product'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                            </div>
                          </div>

                        </div><!-- /.box-body -->

                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>

                      <form class="form-horizontal hide" id="formEdit" action="module/product/aksi_simpan_price.php" method="post" >
                        
                        <div class="box-body">

                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Qty</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="qty" name="qty" placeholder="Kode Produk">
                              <input type="hidden" class="form-control" id="pp_id" name="pp_id" value="<?php echo $data['id_product'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                            </div>
                          </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div><!-- /.box-footer -->
                      </form>

                    </div>
                  </div>

              <table class="table table-bordered">
                  
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Qty</td>
                      <td>Harga</td>
                      <td>Options</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $y = 1;

                      $prices = "select * from cera_product_price where pp_product_id =".$data['id_product'];
                      $prices = mysqli_query($koneksi,$prices);

                      while($price=mysqli_fetch_array($prices)) {

                    ?>
                      <tr>
                        <td><?php echo $y; ?></td>
                        <td><?php echo $price['pp_qty']; ?></td>
                        <td><?php echo $price['pp_price']; ?></td>
                        <td>

                          <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Options
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="dLabel" aria-labelledby="drop6"> 
                              <li><a href="#" onclick="editPrice('<?php echo $price['pp_qty'];?>', '<?php echo $price['pp_price']; ?>', '<?php echo $price['pp_id'];?>')">Edit</a></li> 
                              <li role="separator" class="divider"></li> 
                              <li><a href="<?php echo $admin_url; ?>module/product/aksi_hapus_price.php?pp_id=<?php echo $price['pp_id'];?>">Delete</a></li> 
                            </ul>

        
                          </div>

                        </td>
                      </tr>

                    <?php
                      $y++;
                      }
                    ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div>
        </div>

      <?php
        }
      ?>
