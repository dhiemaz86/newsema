<?php
	require_once('lib/DBClass.php');
	require_once('models/m_kirim_proposal.php');
//$id=$_GET['a'];
$id = abs((int)$_GET['a']);
$kirim_proposal = new kirim_proposal();
$data=$kirim_proposal->readKirim_proposal($id);

$id_berita=$_GET['a'];
$token=$_GET['token'];
$cek=md5(md5($id_berita).md5('kata acak'));
if($token==$cek){
//syntak menampilkan berita disini

	
	if(isset($_POST['kirim'])){	
	
	
	
	  $ekstensi_diperbolehkan = array('doc','docx');
      $proposal = $_FILES['file']['name'];
      $x = explode('.', $proposal);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

	$data['input_judul']= $_POST['in_judul'];
	$data['input_nomor']= $_POST['in_nomor'];
    $data['input_proposal']= $proposal;
	$data['input_deskripsi']= $_POST['in_deskripsi'];
		
if(empty($data)){
		exit('Data Proposal tidak ditemukan');
	}
if (empty($proposal)) {
		echo'Proposal kosong <br>';
  }
	else{
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'ARSIP/PROPOSAL/proposal_masuk/'.$user.'/'.$proposal);
          $query = mysql_query("INSERT INTO kirim_proposal VALUES(NULL, '$proposal')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN! <br>';
      }
  }
	
	
		$tambah = $kirim_proposal->updater_proposal($_POST['in_id'], $data);
		echo "Proposal Berhasil di Kirim!<br/><br />";
	}
	
$dt = $data[0];

	$id   =  "".$dt['id_proposal']." ";
	$md5id = md5($id);
	$token = md5(md5($id).md5('kata acak'));

?>


<h1>Edit Data Profil</h1>
	<form action="view_edit_kirimproposal.php?a=<?php echo $id?>&token=<?php echo $token; ?>" method="post" enctype="multipart/form-data">
	Id_proposal :<br />
	<input type="text" name="in_id" readonly="true" value="<?php echo $dt['id_proposal'] ?>" ><br />
	Judul :<br />
	<input type="text" name="in_judul" value="<?php echo $dt['judul'] ?>" ><br />
	No Surat :<br />
	<input type="text" name="in_nomor" value="<?php echo $dt['no_surat'] ?>"><br />
	Proposal : <br /><?php echo $dt['proposal'] ?>
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