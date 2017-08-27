<?php session_start(); ?>
<?php if (!empty($_SESSION['usernameku']) && !empty($_SESSION['passwordku'])) { ?>



<?php
include('header.php');
include('koneksi.php');

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
            <div >
                <?php
                         include('panel_menu.php');
                    ?>       

                        <div class="col-md-12" style="background-color: white;">

                <div style="padding-top:30px;">
                  
                          
                    
                            <div class="col-md-3" style="background-color: none">
 <table align="center" width="1900px" border="0px" valign="middle">
  <tr height="50px">
    <th colspan="3"> User </th>
  <tr>
  <tr>
    
  </tr>
</table>

                <div style="padding-right: 10px;">
                        
                          <?php include("panel_loginorma.php");?>
                        <div style="border-bottom: 10px; border-color: red;">

 <table align="center" width="1900px" border="1px" bgcolor="red" valign="middle">
  </tr>
  <tr>
<td></td>
  </tr>
</table>
                            <?php include("menu_orma_kiri.php");?>
                        </div>
                </div>            

                
                              

                            </div> <!-- end of col-md-3 -->


                              <div class="col-md-9" style="background-color: none">
                  <div><?php include('isi_keuangan.php');?></div>
                              </div>
  <!-- Bagian KANAN-->     

             
                
                        </div> <!--end of col-md-12-->

              </div>        
                
                    <!-- end slider -->
        
        <div class="panel panel-default">           
                
    <div class="container">
    <div class="col-md-12">
  <!-- Bagian KIRI-->   
  <div class="col-md-3">
 
   </div>
  <!-- Bagian TENGAH-->     
     
  
    



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

<?php

}else{
  echo "<script language='javascript'>alert('Silakan Login Terlebih Dahulu')</script>";
 echo"<script language='javascript'>window.location = 'index.php'</script>";
}
?>