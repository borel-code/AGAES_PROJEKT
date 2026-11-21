<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

 
  ?>
   
  
 
<?php
 


 $q=$_GET["q"];
if($q!=0){ 
$nbre= compternbrevalmat($bdda,$_SESSION['clascalcul'],$q,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  echo "<b><i><u>NB </u>:
   Les notes l'évaluation ".$q." 
  ont été remplies en ".$nbre." matière(s)</i></b>";
}
?>

 