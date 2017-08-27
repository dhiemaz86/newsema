<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_rjalan.php');
	
	$rjalan = new r_jalan();
	$data=$rjalan->readAllr_jalan();

?>
<a href="view_add_rawatjalan.php">Tambah Fasilitas Rawat Jalan</a><br>

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>ID Rawat Jalan</th>
		<th>Nama Pasien</th>
		<th>Foto</th>
		<th>Penyakit</th>
		<th>Action</th>
	

	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $a): ?>
	<tr>
		<td><?php echo $a['id_RJalan']?></td>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['gambar']?></td>
		<td><?php echo $a['deskripsi']?></td>
		<td><a href="view_detail_rawatjalan.php?a=<?php echo $a['id_RJalan'] ?>">
		Detail
		</a> |
		<a href="view_update_rawatjalan.php?a=<?php echo $a['id_RJalan'] ?>">
		Edit
		</a> |
		<a href="view_delete_rawatjalan.php?a=<?php echo $a['id_RJalan'] ?>">
		Hapus
		</a>
		</td>
	</tr>
	<?php endforeach ?>
</tbody>
</table>