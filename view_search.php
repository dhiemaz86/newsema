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
	<!-- Bagian KIRI-->				
	<div class="container">
  <div class="col-md-3">
  
  <?php include('panel_terbanyak.php');?>
  </div>
  <!-- Bagian TENGAH-->		
  <div class="col-md-7">
  <?php include('proses_cari.php');?></div>
  <!-- Bagian KANAN-->		
  <div class="col-md-2">
  <?php include('agenda.php');?></div>
	</div>
</div>
			
			
			
			
			
			
			
			
			
			
                    </div>
                </div>
            </div>
			
                    <div id="footer">
        </div>
    </div>
<?php include('footer_bottom.php') ?>
</div>
</div>
</body>
</html>