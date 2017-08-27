<?php
require_once('lib/DBClass.php');
require_once('models/m_kirim_proposal.php');

$id = abs((int)$_GET['a']);

$kirim_proposal = new kirim_proposal();
$data=$kirim_proposal->readKirim_proposal($id);
$dt = $data[0];

$file     = "".$dt['proposal']."";
$user = "".$dt['user']." ";
$dir = __DIR__ ."".$dt['proposal']."";
$basename = basename($file);
$length   = sprintf("%u", filesize($file));

header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.
//echo file_get_contents("ARSIP/PROPOSAL/proposal_masuk/$user/$lpj");
$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush(); // this is essential for large downloads
} 
fclose($fp);
?>