<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "lib/config.php";
    include "lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namalengkap = $_POST['nama_user'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    $noHP = $_POST['no_hp'];
// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi,"INSERT INTO cera_user (id_user, nama_user, email_user, username_user, pass_user, position_user, phone_user) VALUES ('','$namalengkap', '$email', '$username', '$password', '$position', '$noHP')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data User Berhasil Masuk'); window.location = 'adminweb.php?module=marketing_sales';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data User Gagal Dimasukkan'); window.location = 'adminweb.php?module=tambah_user';</script>";
    }

?>
