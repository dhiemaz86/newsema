<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=/index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idClient=$_POST['id_client'];
    $namaClient=$_POST['client_name'];
    $alamat=$_POST['alamat'];
    $email=$_POST['email'];
    $phoneClient=$_POST['phone_client'];
    $queryEdit = mysqli_query($koneksi, "UPDATE cera_client SET client_name='$namaClient',address_client='$alamat',email_client='$email',phone_client='$phoneClient' WHERE id_client='$idClient'");

    if ($queryEdit) {
        echo "<script> alert('Data Client Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=client';</script>";
    } else {
        echo "<script> alert('Data Client Gagal Diubah'); window.location = 'adminweb.php?module=edit_client&id_client='+'$idClient';</script>";

    }
}
?>
