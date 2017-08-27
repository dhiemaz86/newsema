<?php
	require_once('lib/DBClass.php');
	require_once('models/m_pelayanan.php');
	$id=$_GET['a'];

	$pelayanan = new Pelayanan();
	$data=$pelayanan->readPelayanan($id);

	if(empty($data)){
		exit('Data Not Found');
	}

	$dt=$data[0];

?>
<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>Id Pelayanan</th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Foto</th>
	</tr>
</thead>
<tbody>
	<?php foreach($data as $a):?>
	<tr>
		<td><?php echo $a['id_pelayanan'] ?></td>
		<td><?php echo $a['nama'] ?></td>
		<td><?php echo $a['deskripsi'] ?></td>
		<td><?php echo $a['gambar'] ?></td>
	</tr>
<?php endforeach ?>
</tbody>
</table>