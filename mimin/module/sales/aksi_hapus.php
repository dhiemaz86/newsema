<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idSales = $_GET['sales_id'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM cera_sales WHERE sales_id='$idSales'");
    if ($queryHapus) {
        echo "<script> alert('Data Penjualan Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=sales';</script>";
    } else {
        echo "<script> alert('Data Penjualan Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=sales';</script>";

    }
}
?>
