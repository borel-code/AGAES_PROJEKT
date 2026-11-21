<?php
 session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
 require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
 require 'salaireoutil.php'; require 'pointagefonction.php';
 $trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==3 OR $_SESSION['code']==4 OR $_SESSION['code']==5) ){ 
  ?>
   
  
 
<?php
 echo "<html>
 <head><meta charset='utf-8'></head>";


 $q=$_GET["q"];
if($q!=0){ 
    $tab=array();
    $tab=explode("-",$q);
    $idperiod=$tab[1]; 
    $idens=$tab[0];
    echo lohnbrutadmin($idens,$idperiod,$_SESSION['annee'])."</Br>";
    echo nomC($idens)."</Br>";
}
}
?> 