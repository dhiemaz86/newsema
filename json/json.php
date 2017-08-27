<?php
 include "koneksi.php";  
$query =mysql_query("select * from kategori,berita 
where berita.kategori=2=kategori.id_kategori order by id_berita desc  limit $posisi,$batas");
$result = mysql_query($query) or die(mysql_error());

$arr = array();
while ($row = mysql_fetch_assoc($result)) {
    $temp = array(
        "date" => .$r['tgl_agenda'].,       
        "title" => $row["title"],
        "description" => $row["description"]);

    array_push($arr, $temp);}
$data = json_encode($arr);
echo $data
?>