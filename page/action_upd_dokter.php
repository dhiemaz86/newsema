<?php
	require_once('lib/DBClass.php');
	require_once('models/m_dokter.php');
	
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
	
	$data['input_nama']= $_POST['in_nama'];
	$data['input_spesialis']= $_POST['in_spesialis'];
	$data['input_alamat']= $_POST['in_alamat'];
	$data['input_gender']= $_POST['in_gender'];
	$data['input_telepon']= $_POST['in_telepon'];
	//$data['foto']='img/'.$_POST['in_nis'].'.png';
	
	$dokter->updateDokter($_POST['in_iddokter'], $data);
	
	echo "Data berhasil diubah <br />";
	echo "<a href='action_detail_dokter.php?a=".$_POST['in_iddokter']."'>detail dokter <a/>"
?>