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
$hasil = ("$user");
echo $hasil;
$path = 'file';

if(isset($proposal))
{
    $var_1 = $proposal;
//    $file = $var_1;

$dir = "ARSIP/LPJ/lpj_masuk/$path/"; // trailing slash is important
$file = $dir . $var_1;

if (file_exists($file))
    {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }
} //- the missing closing brace
?>

<!--
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
$hasil = ("$user");
echo $hasil;
$path = 'file';
//$filename='y.docx';

echo file_get_contents("ARSIP/LPJ/lpj_masuk/$path/$lpj");
@header("Content-type: application/msword");
@header("Content-Disposition: attachment; filename=".$dt['user']."_$proposal ");
@header("Content-Type: application/force-download");
/*header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($proposal));

*/
?>
-->