<?php
	require_once('lib/DBClass.php');
	require_once('models/m_pelayanan.php');
	
	$id=$_GET['a'];
	
	/*if(! is_numeric($id)){
		exit('Access Forbiden');
	}*/
	
	$pelayanan = new Pelayanan();
	$data=$pelayanan->deletePelayanan($id);
	
	if(empty($data)){echo"<script>alert('data berhasil di hapus...');
document.location.href='view_pelayanan.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='view_pelayanan.php'; </script>\n";
}

?>

