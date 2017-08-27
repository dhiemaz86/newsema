<?php
	require_once('lib/DBClass.php');
	require_once('models/m_pelayanan.php');

	$pelayanan = new Pelayanan();
	$data=$pelayanan->readAllPelayanan();


?>

<a href="view_add_pelayanan.php">Tambah Pelayanan Rumah Sakit</a><br>

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>ID Pelayanan</th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Gambar</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
<?php foreach ($data as $p): ?>
	<tr>
		<td><?php echo $p['id_pelayanan'] ?></td>
		<td><?php echo $p['nama'] ?></td>
		<td><?php echo $p['gambar'] ?></td>
		<td><?php echo $p['deskripsi'] ?></td>
		

		<td><a href="view_detail_pelayanan.php?a=<?php echo $p['id_pelayanan'] ?>">Detail</a> |
		<a href="view_update_pelayanan.php?a=<?php echo $p['id_pelayanan'] ?>">Edit</a> |
		<a href="view_delete_pelayanan.php?a=<?php echo $p['id_pelayanan'] ?>">Hapus</a></td>
	</tr>
<?php endforeach ?>
</tbody>
</table>