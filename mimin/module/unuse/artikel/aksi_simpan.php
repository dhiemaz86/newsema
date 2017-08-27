<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $judul = $_POST['judul'];
    $artikel = $_POST['artikel'];
// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi, "INSERT INTO artikel (judul, isi) VALUES ('$judul', '$artikel')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Artikel Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=artikel';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Artikel Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_artikel';</script>";
    }

?>
