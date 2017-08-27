<?php

	require_once('lib/DBClass.php');
	require_once('models/m_rinap.php');
	$id=$_GET['a'];

	$rinap = new r_inap();
	$data=$rinap->readr_inap($id);
	
	if(empty($data)){
		exit('Data Not Found');
	}
	
	$dt = $data[0];

?>

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>Id Rawat Inap</th>
		<th>Ruang</th>
		<th>Foto</th>
		<th>Deskripsi</th>

	</tr>
	</thead>
	<tbody>
	<?php foreach($data as $a):?>
	<tr>
		<td><?php echo $a['id_RInap']?></td>
		<td><?php echo $a['nama']?></td>
		<td><img style="height: 30px; " src="file/R_Inap/<?php echo $a['gambar']?>"</td>
		<td><?php echo $a['deskripsi']?></td>
	</tr>
	<?php endforeach ?>
<tbody
</table>
