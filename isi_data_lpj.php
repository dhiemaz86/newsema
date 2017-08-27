<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_data_lpj.php');
	$data_lpj = new data_lpj();
	$data=$data_lpj->baca();

	//print '<pre>';
	//print_r($data);
	//print '</pre>';
	
?>
<a href="view_add_datalpj.php">Tambah LPJ baru</a><br>

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>Orma</th>
		<th>No Surat</th>
		<th>Judul</th>
		<th>LPJ</th>
		<th>Deskripsi</th>
		<th>Masuk</th>
	

	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $a): ?>
	<tr>
		<td><?php echo $a['user']?></td>
		<td><?php echo $a['no_surat']?></td>
		<td><?php echo $a['judul']?></td>
		<td><?php echo $a['lpj']?></td>
		<td><?php echo $a['deskripsi']?></td>
		<td><?php echo $a['tgl_input']?></td>
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
