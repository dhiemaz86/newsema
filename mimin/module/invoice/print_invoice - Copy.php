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
				 	            <th>Nama Pelanggan</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>No HP</th>

		</tr>

<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$sql=mysqli_query($koneksi, "select * from pelanggan");
while($mem=mysqli_fetch_array($sql)){
echo"<tr>
					            <td>$mem[nama]</td>
                      <td>$mem[username]</td>
                      <td>$mem[password]</td>
                      <td>$mem[email]</td>
                      <td>$mem[alamat]</td>
                      <td>$mem[no_hp]</td>
</tr>";

} ?>
</body>
</html>