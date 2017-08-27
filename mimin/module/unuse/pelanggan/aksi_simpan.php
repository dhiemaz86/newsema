<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaPelanggan = $_POST['nama_pelanggan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHP = $_POST['no_hp'];
// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi,"INSERT INTO pelanggan (username, password, nama, alamat, email, no_hp) VALUES ('$username', '$password', '$namaPelanggan', '$alamat', '$email', '$noHP')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Pelanggan Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pelanggan';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Pelanggan Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_pelangggan';</script>";
    }

?>
