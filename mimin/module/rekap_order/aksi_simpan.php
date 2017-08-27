<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "/../../lib/config.php";
    include "/../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaAdmin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi, "INSERT INTO admin (nama_admin,username,password,email) VALUES ('$namaAdmin','$username','$password','$email')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Admin Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=admin';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Admin Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_admin';</script>";
    }

?>
