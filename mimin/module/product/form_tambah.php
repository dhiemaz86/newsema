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
            <small>Produk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Produk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
              <div class="col-md-12">
              <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Data Produk</h3>
                      </div>
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
                              <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" placeholder="Harga">
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

              </div>
              <!-- selesai collapse-->


            <div class="col-md-12">
                
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Nama Product</td>
                      <td>Total Product Child</td>
                      <td>Options</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
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
                              <li><a href="#">Edit</a></li> 
                              <li role="separator" class="divider"></li> 
                              <li><a href="#">Delete</a></li> 
                            </ul>

        
                          </div>

                        </td>
                      </tr>
                    <?php
                      $i++;
                      }
                    ?>
                  </tbody>
                </table>

              </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

      <?php } ?>
