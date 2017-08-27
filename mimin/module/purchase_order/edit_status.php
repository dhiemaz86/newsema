<?php
//aksi edit  untuk kopi
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idJual   = $_GET['id_jual'];

   
          $querySimpan = mysqli_query($koneksi, "UPDATE jual SET status='Shipped' WHERE id_jual='$idJual'");
            if($querySimpan){
                    echo "<script> alert('Status Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=penjualan';</script>";
                }
		
}

?>
