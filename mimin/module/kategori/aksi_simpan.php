<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php

      		include "lib/config.php";
      		include "lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaKategori = $_POST['namaKategori'];
// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi,"INSERT INTO cera_product_category (pc_name) VALUES ('$namaKategori')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = 'adminweb.php?module=category';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = 'adminweb.php?module=tambah_category';</script>";
    }

?>
