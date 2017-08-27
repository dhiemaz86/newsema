<?php
	require_once('lib/DBClass.php');
	require_once('models/m_dokter.php');
	require_once('models/m_spesialis.php');
	$dokter = new Dokter();
	$spesialis = new Spesialis();
	$data_spesialis=$spesialis->readAllSpesialis();

	if(isset($_POST['kirim'])){
		$id_dokter = $_POST['in_iddokter'];
		$nama = $_POST['in_nama'];
		$spesial = $_POST['in_spesialis'];
		$alamat = $_POST['in_alamat'];
		$gender = $_POST['in_gender'];
		$telepon = $_POST['in_telepon'];
		

		$tambah = $dokter->createDokter($id_dokter, $nama, $spesial, $alamat, $gender, $telepon);
		echo "Data dokter berhasil ditambahkan<br/><br />";
	}
?>
<h1>Tambah Data dokter</h1>
<form action="view_add_dokter.php" method="post">
	ID Dokter:<br/>
	<input type="text" name="in_iddokter"><br/>
	Nama Lengkap:<br/>
	<input type="text" name="in_nama"><br/>
	Spesalis:<br/>
	<select name="in_spesialis">
		<option value="">Pilih Spesialis</option>
		<?php foreach($data_spesialis as $n) : ?>
		<option value="<?php echo $n['id_spesialis'] ?>">
			<?php echo $n['nama']; ?>			
		</option>
		<?php endforeach ?>
	</select><br>
	Alamat:<br/>
	<input type="text" name="in_alamat"><br/>
	Gender: <br>
	<input type="radio" name="in_gender" value="male" checked> Male
  	<input type="radio" name="in_gender" value="female"> Female <br>
	Telepon:<br>
	<input type="text" name="in_telepon"><br/>
	<input type="submit" name="kirim" value="simpan"><br/>
</form>