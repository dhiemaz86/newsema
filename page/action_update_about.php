<?php
	require_once('lib/DBClass.php');
	require_once('models/m_about.php');


	$id=$_GET['a'];
	
	//if(! is_numeric($id)){
		//exit('Access Forbiden');
	//}
	
	$about = new about();
	$data=$about->readAbout($id);
	
	
	if(empty($data)){
		exit('Data about tidak ditemukan');
	}
	
	$dt = $data[0];

	
?>


	<h1>Edit Data About</h1>
	<form action="action_upd_about.php" method="post" enctype="multipart/form-data">
	ID About:<br />
	<input type="text" name="id_about" value="<?php echo $dt['id_about'] ?>" readonly="true"><br />
	Nama :<br />
	<input type="text" name="nama" value="<?php echo $dt['nama'] ?>"><br />
	Gambar :<br />
	<?php echo $dt['gambar'] ?>
	<input type="file" name="file"><br />

	Deskripsi:<br />
	<input type="text" name="deskripsi" value="<?php echo $dt['deskripsi'] ?>"><br />
	
	<input type="submit" name="kirim" value="simpan">
	</form>
