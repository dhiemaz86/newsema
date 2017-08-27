<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_about.php');
	$about = new about();
	$data=$about->readAllAbout();

	//print '<pre>';
	//print_r($data);
	//print '</pre>';
	
?>

<table border="1" width="100%">
	<tr>
		<th>ID Dokter</th>
		<th>NAMA</th>
		<th>Gambar</th>
		<th>Deskripsi</th>

		<th colspan="3">Action</th>
	

	</tr>
	<?php foreach ($data as $a): ?>
	<tr>
		<td><?php echo $a['id_about']?></td>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['gambar']?></td>
		<td><?php echo $a['deskripsi']?></td>
		
		<td><a href="view_detail_about.php?a=<?php echo $a['id_about'] ?>">
		detail
		</a>
		</td>
		<td><a href="view_update_about.php?a=<?php echo $a['id_about'] ?>">
		Edit
		</a>
		</td>
		<td><a href="view_delete_dokter.php?a=<?php echo $a['id_dokter'] ?>">
		Hapus
		</a>
		</td>
	</tr>
	<?php endforeach ?>

</table>
