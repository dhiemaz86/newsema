  <?php
  require_once('lib/DBClass.php');
  require_once('models/m_rinap.php');
  $rinap = new r_inap();
  $data=$rinap->readAllr_inap();

  if($_POST['upload']){
      $ekstensi_diperbolehkan = array('png','jpg');
      $foto = $_FILES['file']['name'];
      $x = explode('.', $foto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $id_rinap = $_POST['in_idrinap'];
      $nama = $_POST['in_nama'];
      $deskripsi = $_POST['in_deskripsi'];

      
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
    }

  $tambah = $rinap->creater_inap($id_rinap, $nama, $foto, $deskripsi);

    if(empty($tambah))

      {
        echo"<script>alert('Data rawat inap berhasil ditambahkan');
document.location.href='view_rawatinap.php'; </script>\n";
}
else
{echo"<script>alert('Gagal menambahkan data');
document.location.href='view_add_rawatinap.php'; </script>\n";
}

?>