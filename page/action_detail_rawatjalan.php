<?php

	require_once('lib/DBClass.php');
	require_once('models/m_rjalan.php');
	$id=$_GET['a'];

	$rjalan = new r_jalan();
	$data=$rjalan->readr_jalan($id);
	
	


	if(empty($data)){
		exit('Data Not Found');
	}
	
	$dt = $data[0];



?>

<table border="1">
	<tr>
		<th>Id Rawat Jalan</th>
		<th>Ruang</th>
		<th>Foto</th>
		<th>Gambar</th>
		<th>Deskripsi</th>

	</tr>
	<?php foreach($data as $a):?>
	<tr>
		<td><?php echo $a['id_RJalan']?></td>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['gambar']?></td>
		<td><img style="height: 30px; " src="file/R_Jalan/<?php echo $a['gambar']?>"</td>
		<td><?php echo $a['deskripsi']?></td>
	</tr>
	<?php endforeach ?>

</table>
