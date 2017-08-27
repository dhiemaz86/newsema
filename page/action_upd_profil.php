<?php
	require_once('lib/DBClass.php');
	require_once('models/m_profil.php');
	
	if (! isset($_POST['kirim'])){
		exit('Access forbiden');
	}
	
	$about = new about();
	
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
	
	
	$data['nama']= $_POST['nama'];
	$data['gambar']= $_FILES['file']['name'];
	$data['deskripsi']= $_POST['deskripsi'];

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'file/about/'.$foto);
          $query = mysql_query("INSERT INTO upload VALUES(NULL, '$foto')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
	//$data['foto']='img/'.$_POST['in_nis'].'.png';
	
	$about->updateAbout($_POST['id_about'], $data);
	
	echo "Data berhasil diubah <br />";
	echo "<a href='action_detail_about.php?a=".$_POST['id_about']."'>detail About <a/>"
?>