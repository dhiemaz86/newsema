
  
      <td align="left" bgcolor="#FFFFFF"><div align="center">BERITA
        </div>
       
<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
 
        <tr>
          <td>&nbsp;</td>
          <td><p align="left"><a href="tambah_berita.php"> New Post </a></p>
            <p>
              <?php
include "../koneksi.php";

$query = "select * from kategori,berita 
where berita.id_kategori=kategori.id_kategori order by tgl_input desc ";
$sql = mysql_query($query);

?>
<table id="table" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
              <tr bgcolor="#B0B0B0">
                <th>NO</th>
                <th>Kategori</th>
                <th>judul</th>
                
                <th>Tgl input</th>
                
                <th>Gambar</th>
                <th>AKSI</th>
              </tr>
    </thead>
              <?php
$no=1;
while ($data=mysql_fetch_array($sql))
{
?>
              <tr bgcolor="#E4E4E4">
                <td><?php echo $no?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['judul_berita']; ?></td>
                <td><?php echo $data['tgl_input']; ?></td>
                <td><img style="height: 30px; "  src="foto/<?php echo $data['gambar']; ?>"></td>
                <td><a href="hapus_berita.php?id=<?php echo $data['id_berita']; ?>" 
    onClick = "return confirm('Apakah Anda ingin mengapus data <?php echo $data['id_berita']; ?>?')"> Hapus </a> | <a href="edit_berita.php?id=<?php echo $data['id_berita']; ?>" >Edit</a></td>
              </tr>
              <?php
$no++;
}
?>
            </table>
            <p></p></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>