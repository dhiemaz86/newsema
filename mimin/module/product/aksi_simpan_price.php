<?php

session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {

    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";

} else {

    // Load file koneksi.php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    // data selain gambar
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];
    $pro_id = $_POST['product_id'];

    // Proses simpan ke Database
    $querySimpan = mysqli_query($koneksi,"INSERT INTO cera_product_price(
        pp_id,
        pp_product_id,
        pp_qty,
        pp_price
        ) VALUES(
            '',
            '$pro_id',
            '$qty',
            '$harga'
            )");

    if ($querySimpan) {

        // Jika Sukses, Lakukan :
        //echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=child_home&id=$pro_id';</script>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    } else {

        // Jika Gagal, Lakukan :
        //echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=child_home&id=$pro_id';</script>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
?>
