<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_kontak.php');
	$data_kontak = new kontak();
	$data=$data_kontak->readAllkontak();

	//print '<pre>';
	//print_r($data);
	//print '</pre>';
	
?>


<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>Nama</th>
		<th>Nim</th>
		<th>Jabatan</th>
		<th>Kontak</th>
	

	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $a): ?>
	<tr>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['nim']?></td>
		<td><?php echo $a['jabatan']?></td>
		<td><?php echo $a['kontak']?></td>
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
