<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_dokter.php');
	require_once('models/m_spesialis.php');
	$dokter = new dokter();
	$data=$dokter->readAllDokter();

	//print '<pre>';
	//print_r($data);
	//print '</pre>';
	
?>
<a href="view_add_dokter.php">Tambah dokter</a><br>

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>ID Dokter</th>
		<th>NAMA</th>
		<th>Spesialis</th>
		<th>Alamat</th>
		<th>gender</th>
		<th>Telp</th>
		<th>Action</th>
	

	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $a): ?>
	<tr>
		<td><?php echo $a['id_dokter']?></td>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['name']?></td>
		<td><?php echo $a['alamat']?></td>
		<td><?php echo $a['gender']?></td>
		<td><?php echo $a['telepon']?></td>
		<td><a href="view_detail_dokter.php?a=<?php echo $a['id_dokter'] ?>">
		detail
		</a> |
		<a href="view_update_dokter.php?a=<?php echo $a['id_dokter'] ?>">
		Edit
		</a> |
		<a href="view_delete_dokter.php?a=<?php echo $a['id_dokter'] ?>">
		Hapus
		</a>
		</td>
	</tr>
	<?php endforeach ?>
</tbody>
</table>
