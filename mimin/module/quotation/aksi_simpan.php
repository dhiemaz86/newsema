<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login,
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaClient = $_POST['nama_client'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $phoneClient = $_POST['phone_client'];
// query untuk menyimpan ke tabel kategori
    $querySimpan = mysqli_query($koneksi, "INSERT INTO cera_client (client_name,address_client,email_client,phone_client) VALUES ('$namaClient','$alamat','$email','$phoneClient')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Client Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=client';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Client Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_client';</script>";
    }

?>
