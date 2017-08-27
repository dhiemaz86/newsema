<?php
//aksi edit  untuk kopi
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKopi 	= $_POST['id_kopi'];


    $namaKopi = $_POST['nama_kopi'];
    $proses = $_POST['proses'];
    $berat = $_POST['berat'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$nama_file = $_FILES['gambar']['name'];
    $ukuran_file= $_FILES['gambar']['size'];
    $tipe_file 	= $_FILES['gambar']['type'];
    $tmp_file 	= $_FILES['gambar']['tmp_name'];

	$path = "../../upload/" . $nama_file;

	if($nama_file==""){
	$querySimpan = mysqli_query($koneksi,"UPDATE kopi SET nama_kopi='$namaKopi',proses='$proses',berat='$berat',stok='$stok',deskripsi='$deskripsi',harga='$harga' WHERE id_kopi='$idKopi'");
	} else {
		   move_uploaded_file($tmp_file, $path);// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
          $querySimpan = mysqli_query($koneksi,"UPDATE kopi SET nama_kopi='$namaKopi', stok='$stok', gambar='$nama_file', deskripsi='$deskripsi', harga='$harga' WHERE id_kopi='$idKopi'");
			}
				if($querySimpan){
					echo "<script> alert('Data Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=kopi';</script>";
				} else {
					echo "<script> alert('Data Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_kopi=$idKopi';</script>";
				}
}

?>
