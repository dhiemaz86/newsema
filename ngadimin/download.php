<?php
require_once('lib/DBClass.php');
require_once('models/m_kirim_lpj.php');

$id = abs((int)$_GET['a']);

$kirim_lpj = new kirim_lpj();
$data=$kirim_lpj->readKirim_lpj($id);
$dt = $data[0];

//foreach ($data as $a):
$lpj ="".$dt['lpj']."";
$user = "".$dt['user']." ";
$hasil = ("$user$lpj");
echo $hasil;
$path = 'file';
//$filename='y.docx';

@header("Content-type: application/msword");
@header("Content-Disposition: attachment; filename=".$dt['user']."_$lpj ");
echo file_get_contents("ARSIP/LPJ/lpj_masuk/$path/$lpj");

?>