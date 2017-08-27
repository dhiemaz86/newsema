<?php
	require_once('lib/DBClass.php');
	require_once('models/m_dokter.php');
	
	$id=$_GET['a'];
	
	/*if(! is_numeric($id)){
		exit('Access Forbiden');
	}*/
	
	$dokter = new Dokter();
	$data=$dokter->deleteDokter($id);
		
		if(empty($data)){echo"<script>alert('data berhasil di hapus...');
document.location.href='view_dokter.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='view_add_dokter.php'; </script>\n";
}

?>

