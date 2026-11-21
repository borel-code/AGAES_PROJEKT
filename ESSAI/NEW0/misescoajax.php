<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

 
  ?>
   
  
 
<?php
 


 $q=$_GET["q"];
if($q!=0){ 
  $xv="SELECT * FROM eleve WHERE   anelev='".$_SESSION['annee']."' ORDER BY nomelev " ;
  $reponsex= $bdda->query($xv);
  $true=0;
  while ($donneesx= $reponsex->fetch() AND $true==0)
    { 
      if($donneesx['matelev']==$q){ 
     echo "Classe : ".classparid($donneesx['niveauelev'],'e')." </br>
     Cout de la scolarité : ".$donneesx['cout']." </br>
     Total versé pour la scolarité : ".$donneesx['total']." </br>
    Reste de la scolarité : ".$donneesx['reste']." </br>";
    $true=1;
   }
  }
    $reponsex->closeCursor(); 
    }
?>

 