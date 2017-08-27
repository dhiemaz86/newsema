
<?php
	require_once('lib/DBClass.php');
	require_once('models/m_profil_orma.php');
	
	if (! isset($_POST['kirim'])){
		exit('Access forbiden');
	}
	
	$profil = new profil();
	
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
	
	
	$data['nama_orma']= $_POST['in_orma'];
	$data['ketua']= $_POST['in_ketua'];
	$data['kesekretariatan']= $_POST['in_kesekretariatan'];
	$data['kontak']= $_POST['in_kontak'];
	$data['deskripsi']= $_POST['in_deskripsi'];
	$data['logo']= $_FILES['file']['name'];
	
	if (empty($foto)) {
		echo'logo kosong <br>';
  }
	else{


	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'data/logo_orma/'.$foto);
          $query = mysql_query("INSERT INTO profil VALUES(NULL, '$foto')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN! <br>';
      }
  }
	//$data['foto']='img/'.$_POST['in_nis'].'.png';
	
	$profil->updateProfil($data);
	
	echo "Data berhasil diubah <br />";
	echo "<a href='view_profil_orma.php'>Profil Orma <a/>"
?>