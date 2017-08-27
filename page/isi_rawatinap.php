<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_rinap.php');
	
	$rinap = new r_inap();
	$data=$rinap->readAllr_inap();

?>
<a href="view_add_rawatinap.php">Tambah Fasilitas Rawat Inap</a><br>

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>ID Rawat Inap</th>
		<th>Ruang</th>
		<th>Foto</th>
		<th>Deskripsi</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $a): ?>
	<tr>
		<td><?php echo $a['id_RInap']?></td>
		<td><?php echo $a['nama']?></td>
		<td><?php echo $a['gambar']?></td>
		<td><?php echo $a['deskripsi']?></td>
		<td><a href="view_detail_rawatinap.php?a=<?php echo $a['id_RInap'] ?>">
		detail
		</a> |
		<a href="view_update_rawatinap.php?a=<?php echo $a['id_RInap'] ?>">
		Edit |
		</a>
		<a href="view_delete_rawatinap.php?a=<?php echo $a['id_RInap'] ?>">
		Hapus
		</a>
		</td>
	</tr>
	<?php endforeach ?>
</tbody>
</table>
