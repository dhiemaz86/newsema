<?php
	require_once('lib/DBClass.php');
	require_once('models/m_rinap.php');

	$id=$_GET['a'];
	
	//if(! is_numeric($id)){
		//exit('Access Forbiden');
	//}
	
	$rinap = new r_inap();
	$data=$rinap->readr_inap($id);

	if(empty($data)){
		exit('Data rawat inap tidak ditemukan');
	}
	
	$dt = $data[0];

	
?>


	<h1>Edit Data Rawat Inap</h1>
	<form action="action_upd_rawatinap.php" method="post" enctype="multipart/form-data">
	ID Rawat Inap:<br />
	<input type="text" name="in_idrinap" value="<?php echo $dt['id_RInap'] ?>" ><br />
	Nama Fasilitas:<br />
	<input type="text" name="in_nama" value="<?php echo $dt['nama'] ?>"><br />
	Foto:<br /><?php echo $dt['gambar'] ?>
	<input type="file" name="file"><br />
	Deskripsi:<br />
	<input type="text" name="in_deskripsi" value="<?php echo $dt['deskripsi'] ?>"><br />
	
	<input type="submit" name="kirim" value="simpan">
	</form>
