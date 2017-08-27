<?php
	require_once('lib/DBClass.php');
	require_once('models/m_kontak.php');

	$id=$_GET['a'];

	$kontak = new Kontak();
	$data=$kontak->readkontak($id);

	if(empty($data)){
		exit('Data Not Found');
	}

	$dt=$data[0];

?>
<table border="1">
	<tr>
		<th>Id About</th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Foto</th>
	</tr>
	<?php foreach($data as $a):?>
	<tr>
		<td><?php echo $a['id_kontak'] ?></td>
		<td><?php echo $a['nama'] ?></td>
		<td><?php echo $a['daf_kontak'] ?></td>
		<td><?php echo $a['gambar'] ?></td>
	</tr>
<?php endforeach ?>
</table>