<?php

session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {

    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";

} else {

    // Load file koneksi.php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";
    // Ambil Data yang Dikirim dari Form
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    /// data selain gambar
    $idKategori = $_POST['idKategori'];
    $namaProduk = $_POST['namaProduk'];
    $kodeProduk = $_POST['kodeProduk'];
    $deskripsiProduk = $_POST['deskripsiProduk'];

    // check product type
    // shorthand if --> kondisi ? jika_true : jika_false;

    $type = isset($_POST['product_parent_id']) ? 'child' : 'parent';
    $parentId = isset($_POST['product_parent_id']) ? $_POST['product_parent_id'] : 0;

    // Set path folder tempat menyimpan gambarnya
    $path = "../../upload/" . $nama_file;
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if ($ukuran_file <= 1000000) {// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload

            if (move_uploaded_file($tmp_file, $path)) {// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $querySimpan = mysqli_query($koneksi,"INSERT INTO cera_product(
                    id_product,
                    product_name,
                    product_status,
                    product_type,
                    product_parent_id,
                    product_code,
                    product_desc,
                    product_img,
                    product_pc_id
                    ) VALUES(
                        '',
                        '$namaProduk',
                        'active',
                        '$type',
                        '$parentId',
                        '$kodeProduk',
                        '$deskripsiProduk',
                        '$nama_file',
                        '$idKategori'
                        )");

                if ($querySimpan) {// Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=product';</script>";
                } else {
                    // Jika Gagal, Lakukan :
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=product';</script>";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=product';</script>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<script> alert('Data Gambar Produk Gagagl Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'adminweb.php?module=product';</script>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$admin_url'+'adminweb.php?module=product';</script>";
    }
}
?>
