<?php
require_once("proses_kalender.php");
$p=new Mysqlminang("semabaru","localhost","root","");
$sql="select * from kategori,berita 
where berita.id_kategori=2=kategori.id_kategori order by id_berita";
$data=array();
foreach($p->GetAllRows($sql) as $row)
{
	$data[]=array(
				'title'=>$row->judul_berita,
				'start'=>$row->tgl_agenda,
				'end'=>$row->tgl_akhir,
				);
}
	echo json_encode($data);
?>