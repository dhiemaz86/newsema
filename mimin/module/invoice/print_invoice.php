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
  
 window.location = 'adminweb.php?module=invoice';
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


</head>

<body  onLoad="PrintDoc()">

<div id="print">
<table border="0" width="100%">
<tr>

<td width="10%"></td>
<td width="40%">

 <?php 
$image="../cera/module/quotation/image/djongnesia.png";
print"<img src=\"$image\" width=\"90%\" height=\"50%\"\/>";
?>
<?php 
$image="../cera/module/invoice/image/invoice.png";
print"<img src=\"$image\" width=\"50%\" height=\"80%\"\/> <br>";
?>
<text align="left" margin-left="10px" style="font-size: 10px; margin-left: 10px"><b bgcolor="black">19293192</b></text>


</td>
<td width="10%">
</td>
<td width="40%">
  <?php 
$imagex="../cera/module/quotation/image/penghargaan.png";
print"<img src=\"$imagex\" width=\"80%\" height=\"35%\"\/>";
?>
</td>
</tr>
</table>


    <table border="1" width="90%" align="center">
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





</table>
</div>
</body>
</html>