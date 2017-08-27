<?php
	require_once('../lib/DBClass.php');
	require_once('../models/m_dokter.php');
	
	if (! isset($_POST['kirim'])){
		exit('Access forbiden');
	}
	
	$dokter = new Dokter();
	
	/* if($_FILES['in_foto']['error']==0){
		if(!copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png')){
			exit('Error Upload File');
		}
	}
	print_r($_FILES); */
	
	$data['input_nama']= $_POST['nama'];
	$data['input_spesialis']= $_POST['daf_kontak'];
	$data['input_alamat']= $_POST['gambar'];
	//$data['foto']='img/'.$_POST['in_nis'].'.png';
	
	$dokter->updateDokter($_POST['in_iddokter'], $data);
	
	echo "Data berhasil diubah <br />";
	echo "<a href='action_detail_kontak.php?a=".$_POST['in_iddokter']."'>detail dokter <a/>"
?>