<?php
require_once('lib/DBClass.php');
require_once('models/m_kirim_proposal.php');

$id = abs((int)$_GET['a']);

$kirim_proposal = new kirim_proposal();
$data=$kirim_proposal->readKirim_proposal($id);
$dt = $data[0];

//foreach ($data as $a):
$proposal ="".$dt['proposal']."";
$user = "".$dt['user']." ";
$hasil = ("$user$proposal");
echo $hasil;
$path = 'file';
//$filename='y.docx';
//echo ("ARSIP/proposal/proposal_masuk/".$dt['user']."/$proposal");

header("Content-Disposition: attachment; filename=". urlencode($proposal));   
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($proposal));
flush(); // this doesn't really matter.
//echo file_get_contents("ARSIP/PROPOSAL/proposal_masuk/$user/$lpj");



/*
@header('Content-Description: File Transfer');
@header('Content-Type: application/octet-stream');
 header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . $length);
//@header("Content-type: application/force-download");
@header("Content-Disposition: attachment; filename=".$dt['user']."_$proposal ");
echo file_get_contents("ARSIP/PROPOSAL/proposal_masuk/".$dt['user']."/$proposal");
*/
?>