<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idArtikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $artikel = $_POST['artikel'];
    $queryEdit = mysqli_query($koneksi, "UPDATE artikel SET judul='$judul', isi='$artikel' WHERE id_artikel='$idArtikel'");

    if ($queryEdit) {
        echo "<script> alert('Data Artikel Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=artikel';</script>";
    } else {
        echo "<script> alert('Data Artikel Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_artikel&id_artikel='+'$idArtikel';</script>";

    }
}
?>
