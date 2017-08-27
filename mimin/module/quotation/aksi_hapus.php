<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idAdmin = $_GET['id_admin'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin ='$idAdmin'");
    if ($queryHapus) {
        echo "<script> alert('Data Admin Berhasil Dihapus'); window.location = 'adminweb.php?module=admin';</script>";
    } else {
        echo "<script> alert('Data Admin Gagal Dihapus'); window.location = 'adminweb.php?module=admin';</script>";

    }
}
?>
