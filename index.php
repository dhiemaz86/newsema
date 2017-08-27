<?php session_start(); ?>

<?php
include('header.php');
?>
<body class="senatbaru">

<div class="container">
			


    <div id="background">

        <div id="page">



<?php //include('ndasfoto.php'); ?>
			
        <div id="content" >
			
    <!--         <div class="hero-unit-table" style="background-color:red;">
 -->    
				  <!--   image slider        -->        
			<div>
                <?php
   						 include('panel_menu.php');
   					?>       

						<div class="col-md-12">

				<div style="padding-top:30px;">
				  
							<div class="col-md-9">
				  	<div class="slider-wrapper theme-default">
					 	<div id="slider" class="nivoSlider" class="slider-hero">
			
                            
                          <?php include("panel_slider.php"); ?>
						</div>   
					</div>	
							</div> <!-- end of col-md-9 -->
					
							<div class="col-md-3" style="background-color: silver">

				<div style="padding-right: 10px;">
							<?php include("panel_loginorma.php");?>
							
							</div>
				</div>	
						</div> <!--end of col-md-12-->

			</div>        
				
                    <!-- end slider -->
		
		<div class="panel panel-default">			
				
	<div class="container">
	<div class="col-md-12">
  <!-- Bagian KIRI-->	
  <div class="col-md-3">
   <div style="height: 630px; background-color: #ffffff;">

<div>
    <?php include('panel_kalender.php');?>
 </div>
	</div>
   </div>
  <!-- Bagian TENGAH-->		
  <div class="col-md-7" >
  <div><?php include('panel_berita.php');?>
  </div>


  </div>

  <!-- Bagian KANAN-->		
  <div class="col-md-2" style="width: 100px;">
  
   <div style="height: 630px; width: 222px; background-color: #ffffff;">
  <?php include('panel_agenda.php');?>
  </div>
  </div>
  	</div> <!-- end of col-md-12 -->


<br>

	  	<div class="col-md-12 " style="padding-top: 30px; padding-right: 50px;">  		
  	<div class="col-md-3" style="background-color: white;">
  		<?php include('panel_agenda.php');?>
  	</div>
  	
  	<div class="col-md-3" style="background-color: white;">
  		<?php include('panel_agenda.php');?>
  	</div>
  	
  	<div class="col-md-3" style="background-color: white;">
  		<?php include('panel_agenda.php');?>
  	</div>  	

  	<div class="col-md-3" style="background-color: white; ">
  		<?php include('agendaaa.php');?>
  	</div>

  		</div>

  	</div> <!-- end of col-md-12 -->

	</div> <!-- end of container -->
  	

     <div id="footer" style="background-color: #50285d;">
     <center>Copyright@Senat Mahasiswa 2017 </center>  
     </div>


		</div> <!-- end of panel -->

	

			
			
			
			
			
			
			
			
			
			
                    </div>
                </div>
            </div>
			

</body>
</html>