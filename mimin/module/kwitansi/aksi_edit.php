<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idSupplier = $_POST['idsup'];
    $namaSupplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHP = $_POST['no_hp'];
    $queryEdit = mysqli_query($koneksi,"UPDATE supplier SET nama_supplier='$namaSupplier', alamat='$alamat', email='$email', no_hp='$noHP' WHERE id_supplier='$idSupplier'");

    if ($queryEdit) {
        echo "<script> alert('Data Supplier Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=supplier';</script>";
    } else {
        echo "<script> alert('Data Supplier Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_supplieri&id_supplier='+'$idSupplier';</script>";

    }
}
?>
