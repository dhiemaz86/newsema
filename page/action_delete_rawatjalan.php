<?php
	require_once('lib/DBClass.php');
	require_once('models/m_rjalan.php');
	
	$id=$_GET['a'];
	
	/*if(! is_numeric($id)){
		exit('Access Forbiden');
	}*/
	
	$rjalan = new r_jalan();
	$data=$rjalan->deleter_jalan($id);
	
		if(empty($data)){echo"<script>alert('data berhasil di hapus...');
document.location.href='view_rawatjalan.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='view_add_rawatjalan.php'; </script>\n";
}

?>

