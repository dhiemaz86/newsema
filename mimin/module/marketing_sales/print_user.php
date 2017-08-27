<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data User</title>
	<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open('preview.php','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
}
</script>

<?php 
$image="../cera/module/marketing_sales/cera.jpg";
print"<img src=\"$image\" width=\"100px\" height=\"100px\"\/>";
?>


</head>
<body onLoad="window.print()">
DATA MARKETING SALES

		<table border="1" width="90%">
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
</html>