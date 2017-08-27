<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaSupplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHP = $_POST['no_hp'];

// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi,"INSERT INTO supplier (nama_supplier, alamat, email, no_hp) VALUES ('$namaSupplier', '$alamat', '$email', '$noHP')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Supplier Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=supplier';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Supplier Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_supplier';</script>";
    }

?>
