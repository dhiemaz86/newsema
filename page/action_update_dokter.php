<?php
	require_once('lib/DBClass.php');
	require_once('models/m_dokter.php');
	require_once('models/m_spesialis.php');

	$id=$_GET['a'];
	
	//if(! is_numeric($id)){
		//exit('Access Forbiden');
	//}
	
	$dokter = new Dokter();
	$data=$dokter->readDokter($id);
	
	$spesialis = new spesialis();
	$data_spesialis=$spesialis->readAllSpesialis();
	
	
	if(empty($data)){
		exit('Data dokter tidak ditemukan');
	}
	
	$dt = $data[0];

	
?>


	<h1>Edit Data Dokter</h1>
	<form action="action_upd_dokter.php" method="post" enctype="multipart/form-data">
	ID Dokter:<br />
	<input type="text" name="in_iddokter" value="<?php echo $dt['id_dokter'] ?>" readonly="true"><br />
	Nama Lengkap:<br />
	<input type="text" name="in_nama" value="<?php echo $dt['nama'] ?>"><br />
	Spesialis : <br />
	<select name="in_spesialis">
		<option value="">Pilih Spesialis</option>
		<?php foreach ($data_spesialis as $n) : ?>
		<?php $s =($dt['id_spesialis']==$n['id_spesialis'])?"selected":"" ?>
		<option value="<?php echo $n['id_spesialis'] ?>"><?php echo $n['name'] ?></option>
		<?php endforeach ?>
	</select><br />
	Alamat:<br />
	<input type="text" name="in_alamat" value="<?php echo $dt['alamat'] ?>"><br />


	Gender : <br />
	<input type="radio" name="in_gender" value="<?php echo $dt['gender'] ?>" checked >Male
	<input type="radio" name="in_gender" value="<?php echo $dt['gender'] ?>" checked>Female

	<br />

	Telepon:<br />
	<input type="text" name="in_telepon" value="<?php echo $dt['telepon'] ?>"><br />
	
	<input type="submit" name="kirim" value="simpan">
	</form>
