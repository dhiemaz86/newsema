<?php

	if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	    echo "<center>Untuk mengakses modul, Anda harus login <br>";
	    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
	} else { 

// untuk memasukkan file config.php dan file koneksi.php
    include "../lib/config.php";
    include "../lib/koneksi.php";
    include "../lib/helpers.php";

		$id = $_GET['id_pesan'];
		$type = $_GET['type'];

		switch ($type) {
			case 'updatePembayaranPaid':
				
				$q = "update pesan set status_pembayaran = 'paid' where id_pesan=".$id;
				mysqli_query($koneksi,$q);

				break;
			case 'updatePembayaranUnpaid':
				
				$q = "update pesan set status_pembayaran = 'unpaid' where id_pesan=".$id;
				mysqli_query($koneksi,$q);

				break;
			default:
				# code...
				break;
		}
		
		echo "<script> alert('Data Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pesanan';</script>";

	}

?>