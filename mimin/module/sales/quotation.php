<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Quotation</h3>
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#newquotation">Tambah Quotation</button>
       <a href="adminweb.php?module=print_quotation"><button class="btn btn-primary">Print</button></a>  <br>

        <!--- Modal For Tambah -->

        <div class="modal fade" id="newquotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_sales.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">New Quotation</h4>

              </div>

              <div class="modal-body">

                <!--- Details Quotation ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Quotation No</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo @$_SESSION['formData']['quotationNo']; ?>" name="quotationNo" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo @$_SESSION['formData']['nama_client']; ?>" name="nama_client" placeholder="Nama Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo @$_SESSION['formData']['alamat']; ?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo @$_SESSION['formData']['email']; ?>" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="phoneClient" value="<?php echo @$_SESSION['formData']['phone_client']; ?>" name="phone_client" placeholder="Phone Client">
                        </div>

                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Pilih Product</label>                          
                        </div>
                        <div class="col-md-8">
                          
                          <select class="form-control" id="productlist" name="idProductList">
                            <?php

                              $products = mysqli_query($koneksi,"select * from cera_product where product_type='child'");
                              while($p=mysqli_fetch_array($products)){

                            ?>

                                <option value="<?php echo $p['id_product']; ?>"> <?php echo $p['product_name']; ?></option>

                            <?php 
                              } 
                            ?>
                          </select>

                        </div>
                        <div class="col-md-4">

                          <button type="submit" name="tambahProductList" id="btnaddproduct" class="btn btn-primary">Tambah Product</button>

                        </div>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th><center>ID</center></th>
                            <th><center>Jenis Produk</center></th>
                            <th><center>Harga Fix</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Harga Custom</center></th>
                            <th><center>Options</center></th>
                          </tr>
                        </thead>
                        <tbody id="addproductform">

                        <?php
                          
                          $products = @$_SESSION['productList'];

                          if(array_key_exists('productList', $_SESSION)){
                          foreach($products as $data){
                        ?>
                          <tr>
                            <td><center><?php echo $data['id_product']; ?>                           
                                <input type="hidden" name="id[]" value="<?php echo $data['id_product']; ?>"></center>
                            </td>
                            <td><center>
                              <?php echo $data['product_name']; ?></center>
                            </td>
                            <td>

                            <select onchange="setPriceQtyQuotation($(this),$(this).val())" name="fixPriceQty">                             
                              <?php

                                  $prices = mysqli_query($koneksi,"select * from cera_product_price where pp_product_id=".$data['id_product']);
                                  while($p=mysqli_fetch_array($prices)){

                                ?>
                                    <option value="<?php echo $p['pp_id']; ?>"> <?php echo $p['pp_price']; ?> - <?php echo $p['pp_qty']; ?></option>

                              <?php 
                                  } 
                                ?>
                            </select>  
                            </td>
                            <td>
                              <center>

                                <input class="form-control qty" type="number" min="0" name="qty[]" value="0">

                              </center>
                            </td>
                            
                            <td><center><input type="number" class="form-control price" name="harga[]" value="<?php echo $data['product_name']; ?>"></center></td>
                            <td>
                              <button type="submit" name="removeProductList" value="<?php echo $data['id_product'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
                            </td>
                          </tr>
                        <?php 
                          }
                        }
                        ?>
                        </tbody>

                      </table>

                    </div>
                  </div>
              
              </div> <!-- body -->
              <div class="modal-footer">
                <button type="submit" name="saveQuotation" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <!-- end modal for tambah -->

        <div class="box-tools">
          <div class="input-group" style="width: 150px;">
            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button style="display:none" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-hover">
          <tr>
            <th>Quotation No</th>
            <th>Nama Client</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Tanggal</th>
            <th style="width: 110px">Aksi</th>
          </tr>
			<?php

      $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
      $offset = ($page*2);

      $myq = "select * from cera_sales order by sales_quotation_no desc";

			$kueriQuo= mysqli_query($koneksi, $myq);
			while($pro=mysqli_fetch_array($kueriQuo)){
			?>
          <tr>
            <td>#<?php echo $pro['sales_quotation_no']; ?></td>
            <td><?php echo $pro['sales_nama_client']; ?></td>
            <td><?php echo $pro['sales_alamat_client']; ?></td>
            <td><?php echo $pro['sales_email_client']; ?></td>
            <td><?php echo $pro['sales_telp_client']; ?></td>
            <td><?php echo $pro['created_at']; ?></td>
            <td>


                <!-- Single button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#detail<?php echo $pro['sales_id'];?>">Details</a></li>
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#po<?php echo $pro['sales_id'];?>" >Edit</a></li>
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#po<?php echo $pro['sales_id'];?>" >Set As PO</a></li>
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#invoice<?php echo $pro['sales_id'];?>">Set As Invoice</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo $admin_url; ?>module/sales/aksi_hapus.php?sales_id=<?php echo $pro['sales_id'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a></li>
                  </ul>
                </div>

                <div class="btn-group">
                
                
                
            </div></td>
          </tr>
    <?php } ?>
        </table>
      </div><!-- /.box-body -->

    </div><!-- /.box -->

  </div>
</div>

<!-- Modal Untuk Details -->

<?php

                $kueriQuo= mysqli_query($koneksi,$myq);
                while($pro=mysqli_fetch_array($kueriQuo)){

              ?>

                
                <div class="modal fade" id="detail<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail dari Quotation #<?php echo $pro['sales_quotation_no'];?></h4>
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
                            $q = mysqli_query($koneksi,"select * from cera_sales_item join cera_product on cera_product.id_product = cera_sales_item.si_product_id where cera_sales_item.si_sales_id = ".$pro['sales_id']);
                            while($ew = mysqli_fetch_array($q)){
                          ?>
                          <tr>
                            <td><?php echo $ew['product_name'];?></td>
                            <td><?php echo $ew['si_item_price'];?></td>
                            <td><?php echo $ew['si_item_qty'];?></td>
                            <td><?php echo $ew['si_item_price'] * $ew['si_item_qty'];?></td>
                          </tr>
                          <?php $total = $total + ($ew['si_item_price'] * $ew['si_item_qty']); ?>
                          <?php } ?>
                          <tr>
                            <td colspan="3">Grand Total</td>
                            <td><?php echo $total;?></td>
                          </tr>
                        </table>

                      </div>
                      <div class="modal-footer">
                       <a href="adminweb.php?module=print_detail_quotation&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print</button></a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

<!-- end of Modal Untuk Details -->


        <!--- Modal For PO -->
        <?php

                $kueriQuo= mysqli_query($koneksi,$myq);
                while($pro=mysqli_fetch_array($kueriQuo)){

              ?>

        <div class="modal fade" id="po<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_sales.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Quotation to Purchase Order</h4>

              </div>

              <div class="modal-body">

                <!--- Details Quotation ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Purchase Order No</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo @$_SESSION['formDataPO']['quotationNo']; ?>" name="quotationNo" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo @$_SESSION['formDataPO']['nama_client']; ?>" name="nama_client" placeholder="Nama Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo @$_SESSION['formDataPO']['alamat']; ?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo @$_SESSION['formDataPO']['email']; ?>" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="phoneClient" value="<?php echo @$_SESSION['formDataPO']['phone_client']; ?>" name="phone_client" placeholder="Phone Client">
                        </div>

                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Pilih Product</label>                          
                        </div>
                        <div class="col-md-8">
                          
                          <select class="form-control" id="productlist" name="idProductList">
                            <?php

                              $products = mysqli_query($koneksi,"select * from cera_product where product_type='child'");
                              while($p=mysqli_fetch_array($products)){

                            ?>

                                <option value="<?php echo $p['id_product']; ?>"> <?php echo $p['product_name']; ?></option>

                            <?php 
                              } 
                            ?>
                          </select>

                        </div>
                        <div class="col-md-4">

                          <button type="submit" name="tambahProductListPO" id="btnaddproduct" class="btn btn-primary">Tambah Product</button>

                        </div>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th><center>ID</center></th>
                            <th><center>Jenis Produk</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Deskripsi</center></th>
                            <th><center>Gambar</center></th>
                            <th><center>Options</center></th>
                          </tr>
                        </thead>
                        <tbody id="addproductform">

                        <?php
                          
                          $products = @$_SESSION['productListPO'];

                          if(array_key_exists('productListPO', $_SESSION)){
                          foreach($products as $data){

                        ?>
                          <tr>
                            <td><center><?php echo $data['id_product']; ?>
                    
                                <input type="hidden" name="id[]" value="<?php echo $data['id_product']; ?>"></center>
                            </td>
                            <td><center>
                              <?php echo $data['product_name']; ?></center>
                            </td>
                            <td>
                              <center>

                                <input class="form-control" type="number" min="<?php echo $p['pp_qty']; ?>" name="qty[]" value="<?php echo $p['pp_qty']; ?>">

                              </center>
                            </td>
                            <td>
                                <center><?php echo $data['product_desc']; ?></center>

                            </td>
                            <td><center><?php echo $data['product_img']; ?></center></td>
                            <td>
                              <button type="submit" name="removeProductListPO" value="<?php echo $data['id_product'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
                            </td>
                          </tr>
                        <?php 
                          }
                        }
                        ?>
                        </tbody>

                      </table>

                    </div>
                  </div>
              
              </div> <!-- body -->
              <div class="modal-footer">
                <button type="submit" name="saveQuotation" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- end modal for PO -->

        <!-- Modal for Invoice -->
 <?php

                $kueriQuo= mysqli_query($koneksi,$myq);
                while($pro=mysqli_fetch_array($kueriQuo)){

              ?>

        <div class="modal fade" id="invoice<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_sales.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Quotation to Invoice</h4>

              </div>

              <div class="modal-body">

                <!--- Details Quotation ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Purchase Order No</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo @$_SESSION['formDataPO']['quotationNo']; ?>" name="quotationNo" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo @$_SESSION['formDataPO']['nama_client']; ?>" name="nama_client" placeholder="Nama Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo @$_SESSION['formDataPO']['alamat']; ?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo @$_SESSION['formDataPO']['email']; ?>" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="phoneClient" value="<?php echo @$_SESSION['formDataPO']['phone_client']; ?>" name="phone_client" placeholder="Phone Client">
                        </div>

                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Pilih Product</label>                          
                        </div>
                        <div class="col-md-8">
                          
                          <select class="form-control" id="productlist" name="idProductList">
                            <?php

                              $products = mysqli_query($koneksi,"select * from cera_product where product_type='child'");
                              while($p=mysqli_fetch_array($products)){

                            ?>

                                <option value="<?php echo $p['id_product']; ?>"> <?php echo $p['product_name']; ?></option>

                            <?php 
                              } 
                            ?>
                          </select>

                        </div>
                        <div class="col-md-4">

                          <button type="submit" name="tambahProductListPO" id="btnaddproduct" class="btn btn-primary">Tambah Product</button>

                        </div>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th><center>ID</center></th>
                            <th><center>Jenis Produk</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Deskripsi</center></th>
                            <th><center>Gambar</center></th>
                            <th><center>Options</center></th>
                          </tr>
                        </thead>
                        <tbody id="addproductform">

                        <?php
                          
                          $products = @$_SESSION['productListPO'];

                          if(array_key_exists('productListPO', $_SESSION)){
                          foreach($products as $data){

                        ?>
                          <tr>
                            <td><center><?php echo $data['id_product']; ?>
                    
                                <input type="hidden" name="id[]" value="<?php echo $data['id_product']; ?>"></center>
                            </td>
                            <td><center>
                              <?php echo $data['product_name']; ?></center>
                            </td>
                            <td>
                              <center>

                                <input class="form-control" type="number" min="<?php echo $p['pp_qty']; ?>" name="qty[]" value="<?php echo $p['pp_qty']; ?>">

                              </center>
                            </td>
                            <td>
                                <center><?php echo $data['product_desc']; ?></center>

                            </td>
                            <td><center><?php echo $data['product_img']; ?></center></td>
                            <td>
                              <button type="submit" name="removeProductListPO" value="<?php echo $data['id_product'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
                            </td>
                          </tr>
                        <?php 
                          }
                        }
                        ?>
                        </tbody>

                      </table>

                    </div>
                  </div>
              
              </div> <!-- body -->
              <div class="modal-footer">
                <button type="submit" name="saveQuotation" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- end modal for Invoice -->