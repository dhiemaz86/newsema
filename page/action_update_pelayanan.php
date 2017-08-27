<?php
	require_once('lib/DBClass.php');
	require_once('models/m_pelayanan.php');

	$id=$_GET['a'];
	
	//if(! is_numeric($id)){
		//exit('Access Forbiden');
	//}
	
	$pelayanan = new Pelayanan();
	$data=$pelayanan->readPelayanan($id);

	if(empty($data)){
		exit('Data rawat inap tidak ditemukan');
	}
	
	$dt = $data[0];

	
?>


	<h1>Edit Data Pelayanan</h1>
	<form action="action_upd_pelayanan.php" method="post" enctype="multipart/form-data">
	ID Pelayanan:<br />
	<input type="text" name="in_idpelayanan" value="<?php echo $dt['id_pelayanan'] ?>" ><br />
	Nama Pelayanan:<br />
	<input type="text" name="in_nama" value="<?php echo $dt['nama'] ?>"><br />
	Foto:<br /><?php echo $dt['gambar'] ?>
	<input type="file" name="file"><br />
	Deskripsi:<br />
	<input type="text" name="in_deskripsi" value="<?php echo $dt['deskripsi'] ?>"><br />
	
	<input type="submit" name="kirim" value="simpan">
	</form>
