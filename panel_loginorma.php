

<?php
include('header.php');
require_once('lib/DBClass.php');
?>
<?php

ob_start();
if(isset($_SESSION['usernameku']))
    {
        $user = $_SESSION['usernameku'];
        
     
  include('koneksi.php');
    $sqlUser = "select * from orma where user='".$_SESSION['usernameku']."'";
    $sqlprofil = "select * from profil where nama_orma='".$_SESSION['usernameku']."'";
    $orma = mysql_fetch_array(mysql_query($sqlUser));
    $profil = mysql_fetch_array(mysql_query($sqlprofil));
    $id_orma =  "".$orma['id_orma']." ";
    $logo   =  "".$profil['logo']." ";
    $user = $_SESSION['usernameku'];



echo"
   <img id='profile-img' class='profile-img-card' style='width: 65%; height: 65%;'' src='data/logo_orma/$logo' />
";
echo'        
 <div>
          



<form>
         <center>';
  echo "<h4><p class='text-uppercase'><strong> $user <strong></p></h4> <br>";

echo'
                <a type="button" class="btn btn-primary" style="width:45%;"" href="index_orma.php">Dashboard</a>
               <a type="button" class="btn btn-primary" style="width:45%;"" href="logout_orma.php">Logout</a>
         </center>
              
               
</form> 

          

        </div>
 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>';





    
 ?>




<?php 
}else{
    include('koneksi.php');
echo'
                <div style="padding-top:10px;">
           <form method="post" action="proses_login_orma.php" class="form-signin" style="height: 230px; border: 10px;">

   <img id="profile-img" class="profile-img-card" style="width: 50px; height: 50px;" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>

        </div>
    </div>
 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>';
}
?>