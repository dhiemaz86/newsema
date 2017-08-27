<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pelanggan</title>
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


		</tr>

<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$sql=mysqli_query($koneksi, "select * from supplier");
while($kat=mysqli_fetch_array($sql)){
echo"<tr>
					            <td>$kat[nama_supplier]</td>
                     <td>$kat[alamat]</td>
                     <td>$kat[email]</td>
                     <td>$kat[no_hp]</td>
</tr>";

} ?>
</body>
</html>