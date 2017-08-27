<?php
	require_once('lib/DBClass.php');
	require_once('models/m_kirim_lpj.php');

	$user = $_SESSION['usernameku'];	
	if(isset($_POST['kirim'])){	
	$kirim_lpj = new kirim_lpj();
	

	  $ekstensi_diperbolehkan = array('doc','docx');
      $lpj = $_FILES['file']['name'];
      $x = explode('.', $lpj);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
		$judul = $_POST['in_judul'];
		$no_surat = $_POST['in_nomor'];
//		$proposal = $_POST['file'];
		$deskripsi = $_POST['in_deskripsi'];
		


if (empty($lpj)) {
		echo'LPJ kosong <br>';
  }
	else{


	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'ngadimin/ARSIP/LPJ/lpj_masuk/'.$user.'/'.$lpj);
          $query = mysql_query("INSERT INTO kirim_lpj VALUES(NULL, '$lpj')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN! <br>';
      }
  }
	




	

		$tambah = $kirim_lpj->createKirim_lpj($judul, $no_surat, $lpj, $deskripsi);
		echo "LPJ Berhasil di Kirim!<br/><br />";
	}
?>
<h1>Kirim LPJ</h1>
<form action="view_add_kirimlpj.php" method="post"  enctype="multipart/form-data">
	Judul:<br/>
	<input type="text" name="in_judul"><br/>
	No Surat:<br/>
	<input type="text" name="in_nomor"><br/>
	LPJ:<br/>
	<input type="file" name="file"><br />
	Deskripsi:<br/>
	<input type="text" name="in_deskripsi"><br/>


	<input type="submit" name="kirim" value="simpan"><br/>
</form>