<?php
//aksi edit  untuk kopi
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idProduk 	= $_POST['id_product'];

    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    /// data selain gambar
    $idKategori = $_POST['idKategori'];
    $namaProduk = $_POST['namaProduk'];
    $kodeProduk = $_POST['kodeProduk'];
    $deskripsiProduk = $_POST['deskripsiProduk'];

	$path = "../../upload/" . $nama_file;

	if($nama_file==""){

	   $querySimpan = mysqli_query($koneksi,"UPDATE cera_product SET product_name='$namaProduk',product_code='$kodeProduk',product_desc='$deskripsiProduk' WHERE id_product='$idProduk'");

	} else {
		   move_uploaded_file($tmp_file, $path);// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
          $querySimpan = mysqli_query($koneksi,"UPDATE cera_product SET product_name='$namaProduk',product_code='$kodeProduk',product_desc='$deskripsiProduk', product_img='$nama_file' WHERE id_product='$idProduk'");
			}
				if($querySimpan){
					echo "<script> alert('Data Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=product';</script>";
				} else {
					echo "<script> alert('Data Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_product=$idProduk';</script>";
				}
}

?>
