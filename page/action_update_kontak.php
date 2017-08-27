<?php
	require_once('lib/DBClass.php');
	require_once('models/m_kontak.php');

	$id=$_GET['a'];
	
	//if(! is_numeric($id)){
		//exit('Access Forbiden');
	//}
	
	$kontak = new Kontak();
	$data=$kontak->readkontak($id);
	
	
	if(empty($data)){
		exit('Kontak tidak ditemukan');
	}
	
	$dt = $data[0];

	
?>


	<h1>Edit Data Kontak</h1>
	<form action="action_upd_kontak.php" method="post" enctype="multipart/form-data">
	Nama Lengkap:<br />
	<input type="text" name="nama" value="<?php echo $dt['nama'] ?>"><br />
	Sdafkontak : <br />	<input type="text" name="nama" value="<?php echo $dt['daf_kontak'] ?>"><br />
	Gambar:<br />
	<input type="text" name="gambar" value="<?php echo $dt['gambar'] ?>"><br />


	<input type="submit" name="kirim" value="simpan">
	</form>
