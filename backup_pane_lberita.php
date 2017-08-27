
<div class=" col-md-10 left">
        <div class="col-md-12 section-title">
		   	<div class="pull-left"><a class="i-text">
            Berita</a></span></div>
        </div>
<?php  
    include "koneksi.php";  
   
$batas=3;

if(empty($paging))
	{
	$posisi=0;
	$paging=1;
	}

else{
	$posisi=($paging-1) * $batas;
	}
$query=mysql_query("select * from berita 
order by id_berita desc  limit $posisi,$batas");
while($r=mysql_fetch_array($query))
{
  echo"<div class='punel panel-default' style='border=10px'>
            <div class='panel-body'>
                <div class='raw'>
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

?>
			
		