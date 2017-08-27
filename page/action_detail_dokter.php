<?php

	require_once('lib/DBClass.php');
	require_once('models/m_dokter.php');
	require_once('models/m_spesialis.php');
	$id=$_GET['a'];

	$dokter = new Dokter();
	$data=$dokter->readDokter($id);
	
	if(empty($data)){
		exit('Data Not Found');
	}
	
	$dt = $data[0];

?>

<table border="1">
	<tr>
		<th>Id Dokter</th>
		<th>Nama</th>
		<th>Spesialis</th>
		<th>Aalamat</th>
		<th>gender</th>
		<th>Telp</th>

	</tr>
	<?php foreach($data as $a):?>
	<tr>
		<td><?php echo $a['id_dokter']?></td>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['name']?></td>
		<td><?php echo $a['alamat']?></td>
		<td><?php echo $a['gender']?></td>
		<td><?php echo $a['telepon']?></td>

	</tr>
	<?php endforeach ?>

</table>
