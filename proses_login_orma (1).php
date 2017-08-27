<?php
 include("koneksi.php");
 
 $usr = $_POST['user'];
 $psw = ($_POST['pass']);
  

 $sql = "SELECT * FROM orma WHERE user='$usr' AND password='$psw'";
 $res =  mysql_query($sql);
 $data = mysql_fetch_array($res);
 $n = mysql_num_rows($res);

 if($n == 1){
  session_start();
 
   
  $_SESSION['usernameku'] = $usr;
  $_SESSION['passwordku'] = $psw;
 
  echo"<script language='javascript'>window.location = 'index_orma.php'</script>";
 }else{
  echo"<script language='javascript'>alert('Username atau Passwordmu NGAWUR!!!!')</script>";
  echo"<script language='javascript'>window.location = 'index.php'</script>";
 }
?>
