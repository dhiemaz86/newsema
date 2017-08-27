  <?php
  require_once('lib/DBClass.php');
  require_once('models/m_pelayanan.php');
  $pelayanan = new Pelayanan();
  $data=$pelayanan->readAllPelayanan();

  if($_POST['upload']){
      $ekstensi_diperbolehkan = array('png','jpg');
      $foto = $_FILES['file']['name'];
      $x = explode('.', $foto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $id_pelayanan = $_POST['in_idpelayanan'];
      $nama = $_POST['in_nama'];
      $deskripsi = $_POST['in_deskripsi'];

      
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){      
          move_uploaded_file($file_tmp, 'file/Pelayanan/'.$foto);
          $query = mysql_query("INSERT INTO upload VALUES(NULL, '$foto')");
          
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
    }

  $tambah = $pelayanan->createPelayanan($id_pelayanan, $nama, $foto, $deskripsi);

    if(empty($tambah))

      {
        echo"<script>alert('Data Pelayanan berhasil ditambahkan');
document.location.href='view_pelayanan.php'; </script>\n";
}
else
{echo"<script>alert('Gagal menambahkan data');
document.location.href='view_add_pelayanan.php'; </script>\n";
}
