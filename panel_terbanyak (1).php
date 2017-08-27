<div class="col-md-12 ">	
		
                <ul class="media-list">
  <h4 class="list-group-item-heading">

        <div class="section-title">Top Artikel</div>
    </h4>
		
		<ul>

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
 echo"					<li class='media'>
                            <div class='media-left'>
													
    <a href='readmore.php?id=$r[id_berita]'>
	<img class='media-object'  src='ngadimin/berita/foto/$r[gambar]' width='64px' height='64px'></a>
							</div>
					   <div class='media-body'>		
<h6> ".substr($r['isi_berita'],0,100)." <a href='readmore.php?id=$r[id_berita]'>[Read More]</a></h5> </p>
					   </div>"; 
						
      
	  
	 

      
    } 

?>   
</div>