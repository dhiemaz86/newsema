<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_kirim_proposal.php');

	$kirim_proposal = new kirim_proposal();
	$data=$kirim_proposal->readALLKirim_proposal();

	//print '<pre>';
	//print_r($data);
	//print '</pre>';
	
?>
<!--<a href="view_add_kirimproposal.php">Kirim Proposal</a><br> -->

<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
	<tr>
		<th>Orma</th>
		<th>No Surat</th>
		<th>Judul</th>
		<th>proposal</th>
		<th>Deskripsi</th>
		<th>Masuk</th>
		<th>Status</th>
	

	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $a): 
	$id   =  "".$a['id_proposal']." ";
	$md5id = md5($id);
	$token = md5(md5($id).md5('kata acak'));
	

	

		?>

	<tr>
		<td><?php echo $a['user']?></td>
		<td><?php echo $a['no_surat']?></td>
		<td><?php echo $a['judul']?></td>
		<td><?php echo $a['proposal']?></td>
		<td><?php echo $a['deskripsi']?></td>
		<td><?php echo $a['tgl_input']?></td>
		<td><?php echo $a['status']?></td>
		<td><a href="cobodwn.php?a=<?php echo $id?>&token=<?php echo $token; ?>">
		Download
		</a> |
		<a href="view_edit_kirimproposal.php?a=<?php echo $id?>&token=<?php echo $token; ?>">
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
