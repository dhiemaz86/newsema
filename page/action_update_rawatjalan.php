<?php
	require_once('lib/DBClass.php');
	require_once('models/m_rjalan.php');

	$id=$_GET['a'];
	
	//if(! is_numeric($id)){
		//exit('Access Forbiden');
	//}
	
	$rjalan = new r_jalan();
	$data=$rjalan->readr_jalan($id);

	if(empty($data)){
		exit('Data rawat jalan tidak ditemukan');
	}
	
	$dt = $data[0];

	
?>


	<h1>Edit Data Rawat Jalan</h1>
	<form action="action_upd_rawatjalan.php" method="post" enctype="multipart/form-data">
	ID Rawat Jalan:<br />
	<input type="text" name="in_idrjalan" value="<?php echo $dt['id_RJalan'] ?>" readonly="true"><br />
	Nama Pasien:<br />
	<input type="text" name="in_nama" value="<?php echo $dt['nama'] ?>"><br />
	Foto:<br /><?php echo $dt['gambar'] ?>
	<input type="file" name="file"><br />
	Penyakit:<br />
	<input type="text" name="in_deskripsi" value="<?php echo $dt['deskripsi'] ?>"><br />
	
	<input type="submit" name="kirim" value="simpan">
	</form>
