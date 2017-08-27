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


</head>

<body  onLoad="PrintDoc()">

<div id="print">
<table border="0" width="100%">
<tr>

<td width="10%"></td>
<td width="40%">

 <?php 
include "lib/config.php";
include "lib/koneksi.php";
 $idsales=$_GET['id_sales'];
 $querySales=mysqli_query($koneksi, "SELECT * FROM cera_sales WHERE sales_id='$idsales'");
 $q = mysqli_query($koneksi,"select * from cera_sales_item join cera_product on cera_product.id_product = cera_sales_item.si_product_id where cera_sales_item.si_sales_id = ".$idsales);
 $queryprod = mysqli_query($koneksi,"select * from cera_product join cera_sales_item on cera_product.id_product = cera_sales_item.si_product_id where cera_sales_item.si_sales_id = ".$idsales);

 $sale=mysqli_fetch_array($querySales);
 $sales=mysqli_fetch_array($q);

$image="../cera/module/quotation/image/djongnesia.png";
print"<img src=\"$image\" width=\"90%\" height=\"50%\"\/>";
?>
<?php 
$image="../cera/module/quotation/image/newquotation.png";
print"<img src=\"$image\" width=\"50%\" height=\"80%\"\/> <br>";


?>



</td>
<td width="10%">
</td>
<td width="40%">
  <?php 


$imagex="../cera/module/quotation/image/penghargaan.png";
print"<img src=\"$imagex\" width=\"80%\" height=\"40%\"\/>";
?>
</td>
</tr>


</table>
<?php
$client=$sale['sales_nama_client'];
$alamat=$sale['sales_alamat_client'];
?>
<table border="0" width="90%" align="center">
<tr>
  <td width="10%">
  </td>
  <td>
    <?php
echo" $sale[sales_quotation_no]";  ?> <br><br>
  
</td>
</tr>
<tr><td colspan="2">
<teks>
Kepada Yth: <br>
Bapak/ibu <?php print" $client"; ?><br>
di <?php print" $alamat"; ?>. <br>
Berikut keterangan harga untuk produk : <br><br>
</teks> </td> 
 
</tr>   
</table>

    <table border="1" width="90%" align="center">
    <tr align="center">
                      <th>No</th>
                      <th>Jenis Produk</th>            
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total</th>
                      <th>Keterangan</th>

    </tr>

<?php
$nomer = 0;
$nomer = $nomer +=1;
$total = 0;
$total = $total + ($sales['si_item_price'] * $sales['si_item_qty']);
$total= number_format($total,2,',','.');
$price= number_format($sales['si_item_price'],2,',','.');
//$sql=mysqli_query($koneksi, "select * from cera_user");
//while($mem=mysqli_fetch_array($sql)){

echo"<tr align='center' >
                      <td>$nomer</td>
                      <td>$sales[product_name]</td>
                      <td>$sales[si_item_qty]</td>
                      <td>Rp$price</td>
                      <td>Rp$total</td>
                      <td>
                      <img id='profile-img' class='profile-img-card' style='width: 200px; height: 200px;'' src='upload/$sales[product_img]' />
                      </td>
</tr>";

//} 
?>

<table border="0" width="90%" align="center">

<tr><td colspan="2">
<teks>
<br><br>
<b>*bahan baku dapat berubah sewaktu-waktu <br>
*stok berjalan <br>
*lama produksi 3-4 minggu <br>
*belum termasuk ongkir dan pajak <br>
</b> <br>
Demikian penawaran harga dari kami, terimakasih sudah menghubungi kami besar harapan kami dapat bermitra dengan perusahaan Anda, salam sukses dari kami . <br>
Terimakasih. <br>
</teks> </td> 
 
</tr>   
</table>


</table>
</div>
</body>
</html>