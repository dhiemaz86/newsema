<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=/index.php><b>LOGIN</b></a></center>";
} else {

    include "/lib/config.php";
    include "/lib/koneksi.php";

    $idAdmin = $_POST['id_admin'];
    $namaAdmin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $queryEdit = mysqli_query($koneksi, "UPDATE admin SET nama_admin='$namaAdmin',username='$username',password='$password',email='$email' WHERE id_admin='$idAdmin'");

    if ($queryEdit) {
        echo "<script> alert('Data Admin Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=admin';</script>";
    } else {
        echo "<script> alert('Data Admin Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_admini&id_admin='+'$idAdmin';</script>";

    }
}
?>
