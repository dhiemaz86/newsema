<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data User</title>
	<script type="text/javascript">
 /*--This JavaScript method for Print command--*/
  function PrintDoc() {
  var toPrint = document.getElementById('print');
  var popupWin = window.open('');
  popupWin.document.open();
  popupWin.document.write('<html><title>::Print Data::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')
  popupWin.document.write(toPrint.outerHTML);
  popupWin.document.write('</html>');
  popupWin.document.close();
  
 window.location = 'adminweb.php?module=sales';
 }
  function PrintPreview() {
  var toPrint = document.getElementById('print');
  var popupWin = window.open('');
  popupWin.document.open();
  popupWin.document.write('<html><title>::Printpreview Data::</title><link rel="stylesheet" type="text/css" href="print.css" media="screen"/></head><body">')
  popupWin.document.write(toPrint.outerHTML);
  popupWin.document.write('</html>');
  popupWin.document.close();
 }
</script>
<div id="print">
	<table border="0" align="center" width="90%">
<tr>
<td width="50%">
<?php 
$image="../cera/module/kwitansi/image/newcera.jpg";
print"<img src=\"$image\" width=\"60%\" height=\"40%\"\/>";
?>
</td>
<td align="right">
<b>	
Yogyakarta <br>
TONDEO BUILDING <br>
Jl. Pawirokuat 21 Condongcatur, <br>
Depok, Sleman, Yogyakarta, Indonesia 55283 <br>
Telpon (0274) 8255152-8285208 <br>
Email : Marketing@ceraproduction.com <br>
</b>
</td>
</tr>
<tr>
<td><b>KWITANSI</b></td>
<td align="right"><b> Id Nomor disini </b></td>
</tr>
</table>

</head>
<body onLoad="PrintDoc()">
DATA MARKETING SALES

		<table align="center" border="1" width="90%">
		<tr>
				 	            <th>No</th>
                      <th>Nama Sales</th>            
                      <th>Email</th>
                      <th>Jabatan</th>
                      <th>No HP</th>

		</tr>

<?php
include "lib/config.php";
include "lib/koneksi.php";
$sql=mysqli_query($koneksi, "select * from cera_user");
while($mem=mysqli_fetch_array($sql)){
echo"<tr>
					            <td>$mem[id_user]</td>
                      <td>$mem[nama_user]</td>
                      <td>$mem[email_user]</td>
                      <td>$mem[position_user]</td>
                      <td>$mem[phone_user]</td>
</tr>";

} ?>
</body>
</table>
</div>
</html>