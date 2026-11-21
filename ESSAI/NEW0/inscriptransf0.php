<?php
if(isset($_POST["rechEL"])){
    $_SESSION['anrechEL']=$_POST["mat"];  
  // $_SESSION['anrechCL']=$_POST["lkas"];
  $_SESSION['waselecta']=1;  
}
$_SESSION['anrechEL']=$_POST["mat"];  
 
   header('location:inscriptransf.php');
?>