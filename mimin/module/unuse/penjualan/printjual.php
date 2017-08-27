<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
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
				 	  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th>Tanggal Jual</th>
                      <th>Nama Kopi</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Status</th>

		</tr>

<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$sql=mysqli_query($koneksi, "select nama, alamat, email, no_hp, tgl_jual, nama_kopi, detail_jual.harga, jumlah, status from jual join detail_jual on detail_jual.id_jual = jual.id_jual 
join kopi on detail_jual.id_kopi = kopi.id_kopi");
while($pro=mysqli_fetch_array($sql)){
echo"<tr>
					            <td>$pro[nama]</td>
                      <td>$pro[alamat]</td>
                      <td>$pro[email]</td>
                      <td>$pro[no_hp]</td>
                      <td>$pro[tgl_jual]</td>
                      <td>$pro[nama_kopi]</td>
                      <td>$pro[harga]</td>
                      <td>$pro[jumlah]</td>
                      <td>$pro[status]</td>
</tr>";

} ?>
</body>
</html>