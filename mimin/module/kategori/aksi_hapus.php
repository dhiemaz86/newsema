<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {

    include "lib/config.php";
    include "lib/koneksi.php";

    $idKategori = $_GET['id_kategori'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM cera_product_category WHERE pc_id='$idKategori'");
    if ($queryHapus) {
        echo "<script> alert('Data Kategori Berhasil Dihapus'); window.location = 'adminweb.php?module=category';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Dihapus'); window.location = 'adminweb.php?module=category';</script>";

    }
}
?>
