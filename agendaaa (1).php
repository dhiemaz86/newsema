<?php
echo' ';
   

echo '<div class="judul-agenda">
<div class="nvhead">Agenda</div>
      </div>

<table  rules="rows" border="0" style="background-color: #fff;">
<tr>
<th> <div id="gbl"> Waktu </div> </th>
<th>Acara</th>
</tr>
<tr>';
 

   
$batas=10;

if(empty($paging))
	{
	$posisi=0;
	$paging=1;
	}

else{
	$posisi=($paging-1) * $batas;
	}
$query=mysql_query("select * from kategori,berita 
where berita.kategori=2=kategori.id_kategori order by id_berita desc  limit $posisi,$batas");
while($r=mysql_fetch_array($query))
 {
echo "
 <td style= padding:10px;>".$r['tgl_agenda']." <br></td>
 <td style= height:30px;><a href=readmore.php?id=$r[id_berita]>".$r['judul_berita']." <br></a><br> </td>
 </tr>";
 }
echo '</table>';

?>