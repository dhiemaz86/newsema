<!-- Bagian ISI-->		
<?php

	require_once('lib/DBClass.php');
	require_once('models/m_berita.php');
?>
	
			<tr>
			<div id="rmore">
	<div class="column">
  <?php
  	$id = abs((int)$_GET['id']);
  	$id_berita=$_GET['id'];
	$token=$_GET['token'];
	$cek=md5(md5($id_berita).md5('kata acak'));
  	//$id=$_GET['id'];
	$berita = new Berita();
	$data=$berita->readBerita($id);
	$r = $data[0];
if($token==$cek){


//
//$query = "select * from berita where id_berita='$id' ";
//$sql = mysql_query($query);
//$r=mysql_fetch_array($sql);


/*include "koneksi.php";
$id=$_GET['id'];
$query = "select * from berita where id_berita='$id' ";

$sql = mysql_query($data);
$r=mysql_fetch_array($sql); */
?>
<div class="section-title"><center><?php echo"$r[judul_berita]"; ?></center></div>
<br>
<br>
<br>
<?php  echo"<div><center> <img border=4 style='height:250px;' src='ngadimin/berita/foto/$r[gambar]'></center> </div>" ?>
 
<?php echo"<h5><p> $r[isi_berita]</p></h5>"; ?>
    <br class="clear" />

	
			</div>
			</tr>
	</div>
<?php
	}
else{
echo "SQL Injection detected! Jangan nakal ya :* ";
}
?>