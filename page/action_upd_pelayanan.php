<?php
	require_once('lib/DBClass.php');
	require_once('models/m_pelayanan.php');
	
	if (! isset($_POST['kirim'])){
		exit('Access forbiden');
	}
	
	$pelayanan = new Pelayanan();
	
	/* if($_FILES['in_foto']['error']==0){
		if(!copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png')){
			exit('Error Upload File');
		}
	}
	print_r($_FILES); */
	$ekstensi_diperbolehkan = array('png','jpg');
      $foto = $_FILES['file']['name'];
      $x = explode('.', $foto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

    $data['input_foto']= $_FILES['file']['name'];
	$data['input_nama']= $_POST['in_nama'];
	$data['input_deskripsi']= $_POST['in_deskripsi'];
	//$data['foto']='img/'.$_POST['in_nis'].'.png';
	
	$pelayanan->updatePelayanan($_POST['in_idpelayanan'], $data);
	
	echo "Data berhasil diubah <br />";
	echo "<a href='view_detail_pelayanan.php?a=".$_POST['in_idpelayanan']."'>Detail Pelayanan<a/>"
?>