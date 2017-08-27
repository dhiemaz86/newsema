<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	
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
</head>
<body onLoad="PrintDoc()">

<div id="print">

<table border="1" border-spacing="15px" width="100%" align="center">
<tr>
<td rowspan="2" width="35%">
 <?php 
$image="../cera/module/purchase_order/image/cera.png";
print"<img src=\"$image\" width=\"90%\" height=\"40%\"\/>";
?>

</td>
<td colspan="2" width="65%">
   <?php 
$imagex="../cera/module/quotation/image/penghargaan.png";
print"<img src=\"$imagex\" width=\"80%\" height=\"35%\"\/>";
?>  
</td>
 
<tr>
<td colspan="2"  border="none">
<text align="left" margin-left="20px" style="font-size: 20px; margin-left: 10px"><b bgcolor="black">T/B/T :  27/07/2017</b></text>
<text align="right" margin-left="70px" style="font-size: 20px; margin-left: 50px"><b bgcolor="black">Klien : Telkom Witel Jogja </b></text>    

<!--<font size="4" align="right">Klien : Telkom Witel Jogja </font> -->
</td>
</tr>
</tr>
</table>

<br>
<br>

		<table border="1" width="90%">
		<tr>
				 	  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
                      <th>Tanggal</th>
                      <th>Client</th>
                      <th>Cargo</th>
                      <th>Packing</th>
                      <th>Nama Cargo</th>
                      <th>Jumlah Koli</th>
                      <th>Harga</th>
                      <th>Total</th>
                      <th>Tanggal Kirim</th>

		</tr>

<?php
include "lib/config.php";
include "lib/koneksi.php";
$sql=mysqli_query($koneksi, "select * from cera_sales_item JOIN cera_sales ON cera_sales.sales_id = cera_sales_item.si_sales_id JOIN cera_delivery ON cera_sales.sales_id_delivery = cera_delivery.delivery_id order by sales_tgl_po desc");
while($pro=mysqli_fetch_array($sql)){
echo"<tr>
					            <td>$pro[sales_tgl_po]</td>
                      <td>$pro[client_name]</td>
                      <td>$pro[cargo]</td>
                      <td>$pro[cargo_name]</td>
                      <td>$pro[koli_qty]</td>
                      <td>$pro[price_cargo]</td>
                      <td>$pro[koli_qty]*$pro[price_cargo]</td>
                      <td>$pro[shipping_time]</td>
</tr>";

} ?>

</table>
</div>
</body>
</html>