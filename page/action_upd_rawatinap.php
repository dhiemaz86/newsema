<?php
	require_once('lib/DBClass.php');
	require_once('models/m_rinap.php');
	
	if (! isset($_POST['kirim'])){
		exit('Access forbiden');
	}
	
	$rinap = new r_inap();
	
	/* if($_FILES['in_foto']['error']==0){
		if(!copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png')){
			exit('Error Upload File');
		}
	}
	print_r($_FILES); */
	$ekstensi_diperbolehkan = array('png','jpg');
      $foto = $_FILES['file']['name'];
      $x = explode('.', $foto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

    $data['input_foto']= $_FILES['file']['name'];
	$data['input_nama']= $_POST['in_nama'];
	$data['input_deskripsi']= $_POST['in_deskripsi'];

	 if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'file/R_inap/'.$foto);
          $query = mysql_query("INSERT INTO upload VALUES(NULL, '$foto')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
	//$data['foto']='img/'.$_POST['in_nis'].'.png';
	
	$rinap->updater_inap($_POST['in_idrinap'], $data);
	
	echo "Data berhasil diubah <br />";
	echo "<a href='view_detail_rawatinap.php?a=".$_POST['in_idrinap']."'>Detail Rawat Inap<a/>"
?>