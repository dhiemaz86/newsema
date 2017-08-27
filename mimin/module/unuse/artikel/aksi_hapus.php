<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idArtikel = $_GET['id_artikel'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel='$idArtikel'");
    if ($queryHapus) {
        echo "<script> alert('Data Artikel Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=artikel';</script>";
    } else {
        echo "<script> alert('Data Artikel Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=artikel';</script>";

    }
}
?>
