<?php
	require_once('lib/DBClass.php');
	require_once('models/m_data_proposal.php');


	$user = $_SESSION['usernameku'];
	if(isset($_POST['kirim'])){	
	$kirim_proposal = new data_proposal();
	

	  $ekstensi_diperbolehkan = array('doc','docx');
      $proposal = $_FILES['file']['name'];
      $x = explode('.', $proposal);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
		$judul = $_POST['in_judul'];
		$no_surat = $_POST['in_nomor'];
//		$proposal = $_POST['file'];
		$deskripsi = $_POST['in_deskripsi'];
		


if (empty($proposal)) {
		echo'Proposal kosong <br>';
  }
	else{


	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'ARSIP/PROPOSAL/data_proposal/'.$user.'/'.$proposal);
          $query = mysql_query("INSERT INTO data_proposal VALUES(NULL, '$proposal')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN! <br>';
      }
  }
	

	

		$tambah = $kirim_proposal->createData_proposal($judul, $no_surat, $proposal, $deskripsi);
		echo "Proposal Berhasil di Kirim!<br/><br />";
	}
?>
<h1>Kirim Proposal</h1>
<form action="view_add_dataproposal.php" method="post"  enctype="multipart/form-data">
	Judul:<br/>
	<input type="text" name="in_judul"><br/>
	No Surat:<br/>
	<input type="text" name="in_nomor"><br/>
	Proposal:<br/>
	<input type="file" name="file"><br />
	Deskripsi:<br/>
	<input type="text" name="in_deskripsi"><br/>


	<input type="submit" name="kirim" value="simpan"><br/>
</form>