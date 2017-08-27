<?php
	require_once('lib/DBClass.php');
	require_once('models/m_kontak.php');

	$kontak = new kontak();
	$data=$kontak->readAllkontak();


?>
<a href="action_delete_kontak.php">Hapus Kontak</a><br>
<table border="1" width="100%">
	<tr>
		<th>Nama</th>
		<th>Daf kontak</th>
		<th>Gambar</th>
		<th colspan="3">Action</th>
	</tr>

<?php foreach ($data as $p): ?>
	<tr>
		<td><?php echo $p['nama'] ?></td>
		<td><?php echo $p['daf_kontak'] ?></td>
		<td><?php echo $p['gambar'] ?></td>
		<td><a href="view_detail_kontak.php?a=<?php echo $p['id_kontak'] ?>">Detail</a></td>
		<td><a href="view_update_kontak.php?a=<?php echo $p['id_kontak'] ?>">Edit</a></td>
		<td><a href="action_hapus_kontak.php?a=<?php echo $p['id_kontak'] ?>">Hapus</a></td>
	</tr>
<?php endforeach ?>
</table>