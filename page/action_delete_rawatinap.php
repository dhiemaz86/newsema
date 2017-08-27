<?php
	require_once('lib/DBClass.php');
	require_once('models/m_rinap.php');
	
	$id=$_GET['a'];
	
	/*if(! is_numeric($id)){
		exit('Access Forbiden');
	}*/
	
	$rinap = new r_inap();
	$data=$rinap->deleter_inap($id);
	
	if(empty($data)){echo"<script>alert('data berhasil di hapus...');
document.location.href='view_rawatinap.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='view_rawatinap.php'; </script>\n";
}

?>

