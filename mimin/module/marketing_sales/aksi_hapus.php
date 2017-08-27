<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "lib/config.php";
    include "lib/koneksi.php";

    $iduser = $_GET['id_user'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM cera_user WHERE id_user ='$iduser'");
    if ($queryHapus) {
        echo "<script> alert('Data User Berhasil Dihapus'); window.location = 'adminweb.php?module=marketing_sales';</script>";
    } else {
        echo "<script> alert('Data User Gagal Dihapus'); window.location = 'adminweb.php?module=marketing_sales';</script>";

    }
}
?>
