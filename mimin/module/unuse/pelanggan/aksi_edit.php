<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPelanggan = $_POST['id_pelanggan'];
    $namaPelanggan = $_POST['nama_pelanggan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['no_hp'];
    $queryEdit = mysqli_query($koneksi,"UPDATE pelanggan SET nama='$namaPelanggan',username='$username',password='$password',email='$email',alamat='$alamat',no_hp='$noHP' WHERE id_pelanggan='$idPelanggan'");

    if ($queryEdit) {
        echo "<script> alert('Data Pelanggan Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pelanggan';</script>";
    } else {
        echo "<script> alert('Data Pelanggan Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_pelanggani&id_pelanggan='+'$idPelanggan';</script>";

    }
}
?>
