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
            <small>Invoice</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Invoice</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Invoice</h3>
              </div>
              <form class="form-horizontal" action="module/client/aksi_simpan.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Invoice No</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="invoiceNo" name="invoiceNo" placeholder="Nomor Invoice">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Client</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaClient" name="nama_client" placeholder="Nama Client">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Telepon/HP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="phoneClient" name="phone_client" placeholder="Phone Client">
                      </div>
                    </div>

                    <!-- dari sini -->
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Pilih Produk</label>
                    <div class="col-md-5">
                    <select class="form-control" name="idKopi">
                      <?php

                      $kueriProduk= mysqli_query($koneksi,"select * from kopi");
                      while($pro=mysqli_fetch_array($kueriProduk)){

                      ?>
                          <option value="<?php echo $pro['id_kopi']; ?>"> <?php echo $pro['nama_kopi']; ?></option>
                      <?php 

                        } 

                      ?>
                    </select>
                    </div>
                    <div class="col-md-5">
                      <?php 
                        // nah ini kamu salah di tag html select
                        // option itu gk ada atribut name, adanya di tag select
                      ?>
                      <select class="form-control" name="idKategori">
                              <?php
                              $kueriKategori= mysqli_query($koneksi,"select * from kategori");
                              while($kat=mysqli_fetch_array($kueriKategori)){
                              ?>
                                  <option value="<?php echo $kat['id_kategori']; ?>"> <?php echo $kat['nama_kategori']; ?></option>
                              <?php 
                                } 
                              ?>
                      </select>
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-10">
                        <input name="jumlah" id="jumlah" min="1" value="1" type="number" class="form-control" required>
                        </div>
                      </div>
                
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                        <input name="harga" id="harga" class="form-control" tabindex="10" placeholder="Masukkan Harga" required>
                        </div>
                      </div>

                      <div class="form-group">
                      <div class="col-md-12" align="center">
                      <input class="" type="submit" name="tambahProduk" value="Tambah Produk">
                      </div>
                      </div>

                      <?php
          
                    // nyimpen custom order sementara disini pake session
                    if(isset($_POST['tambahOrder'])){

                      // kita pake array multidimensi jadi nanti foreach
                      $_SESSION['customer_items'][] = array(

                        'idKopi' => $_POST['idKopi'],
                        'idKategori' => $_POST['idKategori'],
                        'keterangan' => $_POST['keterangan'],
                        'jumlah' => $_POST['jumlah']

                        );

                    }
                    
                    if(isset($_GET['deleteItem'])){
                      unset($_SESSION['customer_items']);
                    }

                  ?>
                  <table class="table table-hover table-condensed" border="1">
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Jenis Produk</center></th>
                      <th><center>Jumlah</center></th>
                      <th><center>Harga</center></th>
                      <th><center>Total</center></th>
                      <th><center>Keterangan</center></th>
                      <th><center>Options</center></th>
                    </tr>
                      <?php
                        $no = 0;
                        if (isset($_SESSION['customer_items'])) {               
                            foreach ($_SESSION['customer_items'] as $data) {

                              if(array_key_exists('idKopi', $data)){
                                $query = mysqli_query($koneksi, "select * from kopi where id_kopi =".$data['idKopi']);
                                $pro = mysqli_fetch_array($query);
                                
                                // nah ini utk ngambil kategori harus select database dulu kan ?

                                $kategori = mysqli_query($koneksi,"select * from kategori where id_kategori=".$data['idKategori']);
                                $kategori = mysqli_fetch_array($kategori);

                                ?>
                                  <tr>
                                    <td><center><?php echo $no+1; ?></center></td>
                                    <td><center><?php echo $pro['nama_kopi']; ?></center></td>
                                    <td><center><?php echo $kategori['nama_kategori']; ?></center></td>
                                    <td><center><?php echo $data['keterangan']; ?></center></td>
                                    <td><center><?php echo $data['keterangan']; ?></center></td>
                                    <td><center><?php echo $data['jumlah']; ?></center></td>
                                    <td><a href="<?php echo $base_url.'order.php?deleteItem='.$no;?>">Remove</a></td>
                                  </tr>
                                    
                      <?php

                            $no++;  
                          }
                        }
                      }

                      ?>  
                    <?php if($no == 0){ ?>        
                    <tr>
                      <td colspan="7" style="text-align: center">No Items Yet</td>
                    </tr>
                    <?php } ?>
                  </table>

          <!--sampai sini-->

                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
      </div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>
