<?php
	require_once('lib/DBClass.php');
	require_once('models/m_about.php');

	$id=$_GET['a'];

	$about = new about();
	$data=$about->readAbout($id);

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
		<td><?php echo $a['id_about'] ?></td>
		<td><?php echo $a['nama'] ?></td>
		<td><?php echo $a['deskripsi'] ?></td>
		<td><?php echo $a['gambar'] ?></td>
	</tr>
<?php endforeach ?>
</table>