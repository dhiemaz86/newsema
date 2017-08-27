<div class=" col-md-10 left">
        <div class="col-md-12 section-title">
		   	<div class="pull-left"><a class="i-text">
            Pencarian</a></span></div>
        </div>

<?php
include"koneksi.php";
$nama=$_POST['name'];
$query="SELECT * FROM berita where judul_berita like '%$nama%'";
$hasil=mysql_query($query);
echo"<center>";
echo"<h2>Hasil Pencarian</h2>";

if($r=mysql_fetch_array($hasil)){
    echo"<div class='panel panel-default'>
            <div class='panel-body'>
                <div class='row'>
					<div class='col-md-12'>
						<div class='berita'>
                               <div class='col-md-7'>
									<div class='caption'>

				<h3><a class='b-text' href='readmore.php?id=$r[id_berita]'>$r[judul_berita]</a></strong></h3>						
		<p>".substr($r['isi_berita'],0,150)." <br><a  class='pull-right' href='readmore.php?id=$r[id_berita]'><h2>  Selengkapnya >> </a></p></h2> 
									</div> 
								</div>
					<div class='col-md-5' 		style='text-align=right'>
                        <div id='wrapper' class='image-wrap'>
		<img style='height:160px;' class='img-responsive img-load-lazy' src='ngadimin/berita/foto/$r[gambar]'>

						</div>
					</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 "; 
}
else
{
echo"DATA TIDAK DI TEMUKAN!";
}


?>
<br>
    <body><a href='index.php'><input type='submit' value='Kembali'></a></body>
