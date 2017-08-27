<?php
	
	require_once('lib/DBClass.php');
	require_once('models/m_profil_orma.php');

	/* $sqlUser = "select * from orma where user='".$_SESSION['usernameku']."'";
 	 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 $id   =  "".$orma['id_orma']." ";

	 $quweri = "select * from profil where orma='".$id."'";
 	 $orma = mysql_fetch_array(mysql_query($quweri));
   	 */

//echo "$nama";

	$profil = new profil();
	$data=$profil->baca();

	
	//print '<pre>';
	//print_r($data);
	//print '</pre>';
	 $dt = $data[0];
?>


	<h1>Edit Data Profil</h1>
	<form action="view_update_profil.php" method="post" enctype="multipart/form-data">
	Nama Orma :<br />
	<input type="text" name="in_orma" value="<?php echo $dt['nama_orma'] ?>" ><br />
	Nama Ketua :<br />
	<input type="text" name="in_ketua" value="<?php echo $dt['ketua'] ?>"><br />
	Kesekretariatan :<br />
	<input type="text" name="in_kesekretariatan" value="<?php echo $dt['kesekretariatan'] ?>"><br />
	Kontak :<br />
	<input type="text" name="in_kontak" value="<?php echo $dt['kontak'] ?>"><br />
	Deskripsi :<br />
	<input type="text" name="in_deskripsi" value="<?php echo $dt['deskripsi'] ?>"><br />
	
	Logo :<br /><?php echo $dt['logo'] ?>
	<input type="file" name="file"><br />
	
	<input type="submit" name="kirim" value="simpan">
	</form>

