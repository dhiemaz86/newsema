<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idJual = $_GET['id_jual'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM jual WHERE id_jual='$idJual'");
    if ($queryHapus) {
        echo "<script> alert('Data Penjualan Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=penjualan';</script>";
    } else {
        echo "<script> alert('Data Penjualan Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=penjualan';</script>";

    }
}
?>
