<!DOCTYPE html>
<html>
<head>
	<title>Coba Print </title>
	<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open('preview.php','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
}
</script>
</head>
<body onLoad="window.print()">

		<table border="1" width="90%">
		<tr>
				 	            <th>Nama Supplier</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th>Tanggal Beli</th>
                      <th>Nama Kopi</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                      <th>Total</th>
                      <th>Status</th>

		</tr>

<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$sql=mysqli_query($koneksi, "select nama_supplier, alamat, email, no_hp, tgl_beli, nama_kopi, harga, jumlah, subtotal, status_beli from supplier
join beli on supplier.id_supplier = beli.id_supplier
join detail_beli on beli.id_beli = detail_beli.id_beli
join kopi on detail_beli.id_kopi = kopi.id_kopi");
while($pro=mysqli_fetch_array($sql)){
echo"<tr>
					            <td>$pro[nama_supplier]</td>
                      <td>$pro[alamat]</td>
                      <td>$pro[email]</td>
                      <td>$pro[no_hp]</td>
                      <td>$pro[tgl_beli]</td>
                      <td>$pro[nama_kopi]</td>
                      <td>$pro[harga]</td>
                      <td>$pro[jumlah]</td>
                      <td>$pro[subtotal]</td>
                      <td>$pro[subtotal]</td>
                      <td>$pro[status_beli]</td>
</tr>";

} ?>
</body>
</html>