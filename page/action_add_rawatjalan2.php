  <?php
  	require_once('lib/DBClass.php');
	require_once('models/m_rjalan.php');
	$rjalan = new r_jalan();
	$data=$rjalan->readAllr_jalan();

  if($_POST['upload']){
      $ekstensi_diperbolehkan = array('png','jpg');
      $foto = $_FILES['file']['name'];
      $x = explode('.', $foto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
        
        $id_rjalan = $_POST['in_idrjalan'];
		$nama = $_POST['in_nama'];
		$deskripsi = $_POST['in_deskripsi'];



      
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'file/R_Jalan/'.$foto);
          $query = mysql_query("INSERT INTO upload VALUES(NULL, '$foto')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
    }

	$tambah = $rjalan->creater_jalan($id_rjalan, $nama, $foto, $deskripsi);

    if(empty($tambah))

      {
        echo"<script>alert('Data rawat jalan berhasil ditambahkan');
document.location.href='view_rawatjalan.php'; </script>\n";
}
else
{echo"<script>alert('Gagal menambahkan data');
document.location.href='view_add_rawatjalan.php'; </script>\n";
}

?>