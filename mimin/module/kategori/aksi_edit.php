<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {

    include "lib/config.php";
    include "lib/koneksi.php";

    $idKategori = $_POST['id_kategori'];
    $namaKategori = $_POST['nama_kategori'];
    $queryEdit = mysqli_query($koneksi,"UPDATE cera_product_category SET pc_name='$namaKategori' WHERE pc_id='$idKategori'");

    if ($queryEdit) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = 'adminweb.php?module=category';</script>";
    } else {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = 'adminweb.php?module=edit_category&id_kategori='+'$idKategori';</script>";

    }
}
?>
