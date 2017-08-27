<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "lib/config.php";
    include "lib/koneksi.php";

     $idUser=$_GET['id_user'];

    $namaUser = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $noHP = $_POST['no_hp'];

    $queryEdit = mysqli_query($koneksi,"UPDATE cera_user SET nama_user='$namaUser',username_user='$username',pass_user='$password',email_user='$email',position_user='$position',phone_user='$noHP' WHERE id_user='$idUser'");

    if ($queryEdit) {
        echo "<script> alert('Data Pelanggan Berhasil Masuk'); window.location = 'adminweb.php?module=list_user';</script>";
    } else {
        echo "<script> alert('Data Pelanggan GAGAL Masuk'); window.location = 'adminweb.php?module=edit_user&id_user='+'$idUser';</script>";

    }
}
?>
