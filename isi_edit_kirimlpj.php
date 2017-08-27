<?php
	require_once('lib/DBClass.php');
	require_once('models/m_kirim_lpj.php');
//$id=$_GET['a'];
$id = abs((int)$_GET['a']);
$kirim_lpj = new kirim_lpj();
$data=$kirim_lpj->readkirim_lpj($id);

$id_berita=$_GET['a'];
$token=$_GET['token'];
$cek=md5(md5($id_berita).md5('kata acak'));
if($token==$cek){
//syntak menampilkan berita disini

	
	if(isset($_POST['kirim'])){	
	
	
	
	  $ekstensi_diperbolehkan = array('doc','docx');
      $lpj = $_FILES['file']['name'];
      $x = explode('.', $lpj);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

	$data['input_judul']= $_POST['in_judul'];
	$data['input_nomor']= $_POST['in_nomor'];
    $data['input_lpj']= $lpj;
	$data['input_deskripsi']= $_POST['in_deskripsi'];
		
if(empty($data)){
		exit('Data lpj tidak ditemukan');
	}
if (empty($lpj)) {
		echo'lpj kosong <br>';
  }
	else{
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'ARSIP/lpj/lpj_masuk/'.$user.'/'.$lpj);
          $query = mysql_query("INSERT INTO kirim_lpj VALUES(NULL, '$lpj')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN! <br>';
      }
  }
	
	
		$tambah = $kirim_lpj->updater_lpj($_POST['in_id'], $data);
		echo "lpj Berhasil di Kirim!<br/><br />";
	}
	
$dt = $data[0];
?>
<h1>Edit Data Profil</h1>
	<form action="view_edit_kirimlpj.php?a=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	Id_lpj :<br />
	<input type="text" name="in_id" readonly="true" value="<?php echo $dt['id_lpj'] ?>" ><br />
	Judul :<br />
	<input type="text" name="in_judul" value="<?php echo $dt['judul'] ?>" ><br />
	No Surat :<br />
	<input type="text" name="in_nomor" value="<?php echo $dt['no_surat'] ?>"><br />
	lpj : <br /><?php echo $dt['lpj'] ?>
	<input type="file" name="file"><br />
	Deskripsi :<br />
	<input type="text" name="in_deskripsi" value="<?php echo $dt['deskripsi'] ?>"><br />
	
	
	
	<input type="submit" name="kirim" value="simpan">
</form>
<?php






}
else{
echo "SQL Injection detected! Jangan nakal ya :* ";
}
?>